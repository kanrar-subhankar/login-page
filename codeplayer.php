
<html>
<head>
<title>
Codeplayer
</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
#logo{
	padding:5px 0 0 20px;
	font-weight:bold;
	font-size:120%;
	float:left;
}
body{
	margin:0;
	padding: 0;
}
#menuBar{
	width:100%;
	height:40px;
	background-color:#e0e0e0; 
	border-bottom:1px solid grey;
}
#buttonDiv{
	float:right;
	padding:5px 10px 0 0;
}
#runButton{
	font-size:120%;
}

#toggles{
	width:189px;
	list-style: none;
	margin:0 auto;
	border:1px solid grey;
	border-radius:3px;
	height:27px;
	padding:0;
	position:relative;
	top:5px;
}
#toggles li{
	float:left;
	border-right:1px solid grey;
	padding:5px 7px;
}
.clear{
	clear:both;
}
.codeContainer{
	height:100%;
	width:50%;
	float:left;
	position:relative;
}
.codeContainer textarea{
	width:100%;
	height:100%;
	border:none;
	box-sizing:border-box;
	border-right:1px solid grey;
	font-family:sans-serif;
	font-size:98%;
	padding:5px;
}
.codeLabel{
	position: absolute;
	right:10px;
	top:10px;
}
#CSSContainer,#JSContainer{
	display:none;
}
iframe{
	position:relative;
	height:100%;
	left:20px;
	border:none;
}
.selected{
	background:grey;
}

</style>
<body>
<div id="wrapper">
<div id="menuBar">
<div id="logo">
Codepalyer
</div>
<div id="buttonDiv">
<button id="runButton">Run</button>
</div>
<ul id="toggles">
<li class="toggle selected">HTML</li>
<li class="toggle">CSS</li>
<li class="toggle">JS</li>
<li class="toggle selected" style="border:none">Result</li>
</ul>
</div>
<div class="clear"></div>
<div class="codeContainer" id="HTMLContainer">
<div class="codeLabel">HTML</div>
<textarea id="htmlCode">Example code</textarea>
</div>

<div class="codeContainer" id="CSSContainer">
<div class="codeLabel">CSS</div>
<textarea id="cssCode">Example code</textarea>
</div>

<div class="codeContainer" id="JSContainer">
<div class="codeLabel">JS</div>
<textarea id="jsCode">alert("Hi");</textarea>
</div>

<div class="codeContainer" id="resultContainer">
<div class="codeLabel">Result</div>
<iframe id="resultFrame"></iframe>
</div>
</div>
<script type="text/javascript">
var windowHeight=$(window).height();
var menuBarHeight=$("#menuBar").height();

var codeContainerHeight=windowHeight-menuBarHeight;

$("#codeContainer").height(codeContainerHeight+"px");

$(".toggle").click(function(){
$(this).toggleClass("selected");
var activeDiv=$(this).html();
$("#"+activeDiv+"Container").toggle();
var showingDivs=$(".codeContainer").filter(function(){
return ($(this).css("display")!="none");
}).length;
var width=100/showingDivs;
$(".codeContainer").css("width",width+"%");



});
$("#runButton").click(function(){
$("iframe").contents().find("html").html('<style>'+$("#cssCode").val()+'</style>'+$("#htmlCode").val());
document.getElementById("resultFrame").contentWindow.eval($("#jsCode").val());

});

</script>
<?php
require("database_signup.php");
if(isset($_POST['submit'])){
	if(isset($_POST['fname']) AND isset($_POST['email']) AND isset($_POST['password']))
{

	$username = mysqli_real_escape_string($connection,$_POST['fname']);
	$email = mysqli_escape_string($connection,$_POST['email']); 
	$password=$_POST['password'];
	$query="select * from users  where email='$email' and fname='$username' ";
	$result = mysqli_query($connection,$query);
	$row=mysqli_fetch_assoc($result);
	$hash_pass=$row['password'];
	echo $hash_pass;
	$hash=password_verify($password,$hash_pass);
	if($hash==0){
	$encrypt_pass=password_hash($password,PASSWORD_DEFAULT);
		$sql = "insert into users(fname,email,password) values ('$username','$email','$encrypt_pass')";
		$query1=mysqli_query($connection,$sql);
		if($query1) { 
		echo "<script type='text/javascript'>";
		echo "alert('welcome')";
		echo "</script>";
			}
		}
		else
	{
	echo "<script type='text/javascript'>";
	echo "alert('An account exists')";
	echo "</script>";
	}	
	  }
	
}
else
header("location:login&signup.php");
?>

</body>
</html>
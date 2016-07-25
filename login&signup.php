<?php
require("database_signup.php");
?>
<html>
<head>
<title>
LOGIN
</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="login.css" type="text/css"
</head>
<body>
<ul class="list-inline" id="logo">
<li><h1 class="little">C</h1></li>
<li><h1 id="one">hip</h1></li>
</ul>
</div>
<div class="middle">
<ul class="list-inline" id="main">
<li id="wrap" class="cow" onclick="fun1()";>SIGN UP</li>
<li id="wrap" class="dog" onclick="fun2()";>LOG IN</li>
</ul>
<div id="error"></div>
<form id="shows" autocomplete="off" onsubmit="return validation()"; action="codeplayer.php" method="post" role="form">
	<div class="row" style="margin-left:70px;margin-top:50px">
		<div class="col-md-6">
	<input type="text" name="fname" class="des" placeholder="First Name*" id="fname">
		</div>
	<div class="col-md-6">
	<input type="text" name="sname" class="des" placeholder="Last Name">
	</div>
	</div>
	<div class="row" style="margin-left:70px;margin-top:50px">
	<div class="col-md-12">
	<input type="text" name="email" class="des" placeholder="Email*" style="width:569px" id="email">
	</div>
	</div>
	<div class="row" style="margin-left:70px;margin-top:50px">
	<div class="col-md-12">
	<input type="password" name="password" class="des" placeholder="Set A password" id="password"  style="width:569px">
	</div>
	</div>
<input type="submit" class="btn btn-default" value="SUBMIT" name="submit">
</form>
<form id="hides" autocomplete="off" onsubmit="return validation1()"; action="codeplayer.html" method="post" role="form">
<div class="row" style="margin-left:70px;margin-top:50px">
<div class="col-md-12">
<input type="text" name="fname" class="des" placeholder="Name*" style="width:567px"  id="fname1">
</div>
</div>
<div class="row" style="margin-left:70px;margin-top:50px">
<div class="col-md-12">
<input type="text" name="email" class="des" placeholder="Email*" style="width:567px"  id="email1">
</div>
</div>
<div class="row" style="margin-left:70px;margin-top:50px">
<div class="col-md-12">
<input type="password" name="password" class="des" placeholder="Set A password" id="password" style="width:567px">
</div>
</div>
<input type="submit" class="btn btn-default" value="GET STARTED" name="submit">
</form>
</div>
<script type="text/javascript">
$(function(){
	$(".cow").css("background","#6AFB92");
	$(".des").val("");
	document.getElementById("error").innerHTML="";
});
function fun1(){
	$(".cow").css("background","#6AFB92");
	$(".dog").css("background","rgb(64,64,64)");
	$(".des").val("");
	$("#hides").hide();
	$("#shows").show();
	document.getElementById("error").innerHTML="";
}
function login(){
	$(".dog").css("background","#6AFB92");
	$(".cow").css("background","rgb(64,64,64)");
	$(".des").val("");
		$("#shows").hide();
	$("#hides").show();
}
function fun2(){
	$(".dog").css("background","#6AFB92");
	$(".cow").css("background","rgb(64,64,64)");
	$(".des").val("");
		$("#shows").hide();
	$("#hides").show();
	document.getElementById("error").innerHTML="";
}

function validation(){
	 var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	 var r=$("#email").val();
	 if($("#email").val()=="" || $("#fname").val()==""){
	 	document.getElementById("error").innerHTML="Astericks fields are required  ";
	 	return false;
	}
	else if($("#email").val()!="")
	{
		if(re.test(r)===false){
	 	document.getElementById("error").innerHTML=" Invalid email";
	 	return false;
		}
	}
}
function validation1(){
	 var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	 var r=$("#email1").val();
	 if($("#email1").val()=="" || $("#fname1").val()==""){
	 	document.getElementById("error").innerHTML="Astericks fields are required  ";
	 	return false;
	}
	else if($("#email1").val()!="")
	{
		if(re.test(r)===false){
	 	document.getElementById("error").innerHTML=" Invalid email";
	 	return false;
		}
	}
}
</script>

</body>
</html>
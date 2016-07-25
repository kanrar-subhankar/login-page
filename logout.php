<?php
session_start();
require("database_signup.php");
session_destroy();
header("location:login_signup.php");
?>
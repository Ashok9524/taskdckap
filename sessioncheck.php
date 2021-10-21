<?php

	session_start();
	
	include 'connect.php';
	
	$result=mysql_query("select * from login where BINARY (email='" . $_SESSION["name"] . "' or username='" . $_SESSION["name"] . "') and BINARY password='" . $_SESSION["pwd"] . "'",$con);
	if(mysql_num_rows($result)<=0)
	{
		echo '<script>';
		echo 'window.location.href="login.php";';
		echo '</script>';
	}


?>
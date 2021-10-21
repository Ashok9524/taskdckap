<?php

	include 'connect.php';
	
	$editid=$_POST["editid"];
	$result=mysql_query("select * from customer where id='$editid'",$con);
	$row=mysql_fetch_array($result);
	
	echo json_encode($row);

?>
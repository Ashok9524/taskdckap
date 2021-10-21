<?php

	include 'connect.php';
	
	$deleteid=$_POST["deleteid"];
	$result=mysql_query("delete from customer where id='$deleteid'",$con);
	if(mysql_affected_rows()>0)
	{
		echo 1;
	}
	
?>
<?php
	
	include 'connect.php';
	
	$hid=$_POST["hid"];
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$gender=$_POST["gender"];
	$address=$_POST["address"];
	$zipcode=$_POST["zipcode"];
	$emailid=$_POST["emailid"];
	$mobile=$_POST["mobile"];
	
	if(!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($address) && !empty($zipcode) && !empty($emailid) && !empty($mobile))
	{
		mysql_query("update customer set firstname='$firstname', lastname='$lastname', gender='$gender', address='$address', zipcode='$zipcode', email='$emailid', mobile='$mobile' where id='$hid'",$con);
		echo 1;
	}
	else
	{
		echo 0;
	}
	

?>
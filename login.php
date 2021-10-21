<?php
	session_start();
	include "header.php";
	include "connect.php";
	if($_POST["submit"])
	{
		$uname = $_POST["uname"];
		$upass = $_POST["upassword"];
		
		$result = mysql_query("select * from login where BINARY password='$upass' and (BINARY email='$uname' or username='$uname')", $con);
		//echo "select * from login where BINARY password='$upass' and (BINARY email='$uname' or username='$uname'";
		$row=mysql_fetch_array($result);
		if(mysql_num_rows($result) <= 0)
		{
			echo '<script type="text/javascript">';
			echo 'window.alert("Invalid Username Or Password")';
			echo '</script>';
		}
		else
		{
			$_SESSION['name'] = $uname;
			$_SESSION['pwd'] = $upass;
			$_SESSION['status']=$row['status'];
			echo '<script type="text/javascript">';
			echo 'alert("Login Successfully");'; 
			echo 'window.location.href="index.php";';
			echo '</script>';
		}
	}

?>
<style>
	.card-header
	{
		background-color:#339966;
		color:#fff;
		text-align:center;
	}
	.btn
	{
		background-color:#339966;
		color:#fff;
	}
</style>
<script>
	function myFunction() 
	{
		var x = document.getElementById("inpwd");
		if (x.type === "password") 
		{
			x.type = "text";
		}
		else
		{
			x.type = "password";
		}
	}
</script>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card">
			  <div class="card-header"><b>LOGIN</b></div>
			  <div class="card-body">
					<form method="post" action="#">
						<div class="form-group">
							<label for="exampleInputEmail1"style="color:#339966;"><b>EMAIL ID/Username</b></label>
							<input type="text" class="form-control" id="inname" name="uname" placeholder="Enter Email ID/Username" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1"style="color:#339966;"><b>PASSWORD</b></label>
							<input type="password" class="form-control" id="inpwd" name="upassword" placeholder="Enter password">
						</div>
						<div class="form-group">
							<input type="checkbox" onclick="myFunction()"><b style="color:#339966;"> SHOW PASSWORD</b>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-sm" name="submit">
							<!--a href="registration.php" style="float:right; color:#339966;"><b>Student Registration</b></a-->
						</div>
					</form>			  
			  </div>
			</div>
		</div>
		<div class="col-md-4"></div>		
	</div>
<?php

	include "footer.php";
	
?>
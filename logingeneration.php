<?php

	include "sessioncheck.php";
	$current_page="logingeneration";
	include "header.php";
	include "connect.php";
	
	echo '<datalist id="selcustomer">';
	$res11=mysql_query("select * from customer",$con);
	for(;$row11=mysql_fetch_array($res11);)
	{
		echo '<option>' . $row11["id"] . ' : ' . $row11["firstname"] . ' : ' . $row11["email"] . ' : ' . $row11["mobile"] . '</option>';
	}
	echo '</datalist>';
	
	if(isset($_POST["submit"]))
	{
		$s=explode(" : ",$_POST["selectcustomer"]);
		$email=$s[2];
		$cid=$s[0];
		mysql_query("insert into login values('','$cid','" . $_POST["username"] . "','" . $_POST["cpassword"] . "','$email','user')",$con);
		echo '<script>';
		echo 'alert("Customer Registration Successfully.");';
		echo 'window.location.href="logingeneration.php";';
		echo '</script>';
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
<div class="row">
	<div class="col-md-3"></div>			
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">LOGIN REGISTRATION</div>
			<div class="card-body">
			<form action="#" method="POST">
				<div class="form-group">
					<label class="col-form-label">Select Customer:</label>
					<input type="text" class="form-control" name="selectcustomer" id="selectcustomer" list="selcustomer" value="<?php if(isset($_POST["selectcustomer"])){ echo $_POST["selectcustomer"]; } ?>" required>
				</div>
				<div class="form-group">
					<label class="col-form-label">Username:</label>
					<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($_POST["username"])){ echo $_POST["username"]; } ?>" required>
				</div>
				<div class="form-group">
					<label class="col-form-label">Password:</label>
					<input type="text" class="form-control" name="cpassword" id="cpassword" value="<?php if(isset($_POST["cpassword"])){ echo $_POST["cpassword"]; } ?>" required>
				</div>																
				<div class="form-group">
					<input type="submit" class="btn btn-sm" name="submit" value="Register Now">
				</div>
			</form>
			</div>
		</div>
	</div>  
	<div class="col-md-3"></div>
</div>
<?php

	include "footer";
?>
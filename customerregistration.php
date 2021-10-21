<?php

	include "sessioncheck.php";
	$current_page="customerregistration";
	include "header.php";
	include "connect.php";
	
	if(isset($_POST["submit"]))
	{
		$phone=$_POST["mobile"];
		if(strlen($phone)==10)
		{
			mysql_query("insert into customer values('','" . $_POST["first_name"] . "','" . $_POST["last_name"] . "','" . $_POST["gender"] . "','" . $_POST["address"] . "','" . $_POST["zipcode"] . "','" . $_POST["emailid"] . "','" . $_POST["mobile"] . "')",$con);
			echo '<script>';
			echo 'alert("Customer Registration Successfully.");';
			echo 'window.location.href="customerregistration.php";';
			echo '</script>';
		}
		else
		{
			echo '<script>';
			echo 'alert("Phone Number is Invalid.");';
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
<div class="row">
	<div class="col-md-3"></div>			
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">CUSTOMER REGISTRATION</div>
			<div class="card-body">
			<form action="#" method="POST">
				<div class="form-group">
					<label class="col-form-label">First Name:</label>
					<input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(isset($_POST["first_name"])){ echo $_POST["first_name"]; } ?>" required>
				</div>
				<div class="form-group">
					<label class="col-form-label">Last Name:</label>
					<input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(isset($_POST["last_name"])){ echo $_POST["last_name"]; } ?>" required>
				</div>				
				<div class="form-group">
					<label class="col-form-label">Gender:</label>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="gender" id="gender" value="Male" <?php if($_POST["gender"]=="Male"){ echo checked; } ?>>Male
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="gender" id="gender" value="Female" <?php if($_POST["gender"]=="Female"){ echo checked; } ?>>Female
					  </label>
					</div>
				</div>		
				<div class="form-group">
					<label class="col-form-label">Address:</label>
					<textarea rows="3" class="form-control" id="address" name="address" id="address"><?php if(isset($_POST["address"])){ echo $_POST["address"]; } ?></textarea>
				</div>				
				<div class="form-group">
					<label class="col-form-label">Zipcode:</label>
					<input type="number" class="form-control" name="zipcode" id="zipcode" value="<?php if(isset($_POST["zipcode"])){ echo $_POST["zipcode"]; } ?>" required>
				</div>
				<div class="form-group">
					<label class="col-form-label">Email:</label>
					<input type="email" class="form-control" name="emailid" id="emailid" value="<?php if(isset($_POST["emailid"])){ echo $_POST["emailid"]; } ?>" required>
				</div>
				<div class="form-group">
					<label class="col-form-label">Mobile:</label>
					<input type="number" class="form-control" name="mobile" id="mobile" value="<?php if(isset($_POST["mobile"])){ echo $_POST["mobile"]; } ?>" required>
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
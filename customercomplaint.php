<?php

	include "sessioncheck.php";
	$current_page="customercomplaint";
	include "header.php";
	include "connect.php";
	
	$result=mysql_query("select * from login where BINARY (email='" . $_SESSION["name"] . "' or username='" . $_SESSION["name"] . "') and BINARY password='" . $_SESSION["pwd"] . "'",$con);
	$row=mysql_fetch_array($result);
	$cid=$row["cid"];
	if(isset($_POST["submit"]))
	{

			mysql_query("insert into complaints values('','$cid','" . $_POST["servicename"] . "','" . $_POST["description"] . "')",$con);
			echo '<script>';
			echo 'alert("Customer Registration Successfully.");';
			echo 'window.location.href="customercomplaint.php";';
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
			<div class="card-header">CUSTOMER COMPLAINTS</div>
			<div class="card-body">
			<form action="#" method="POST">
				<div class="form-group">
					<label class="col-form-label">Product/Service Name:</label>
					<input type="text" class="form-control" name="servicename" id="servicename" required>
				</div>
				<div class="form-group">
					<label class="col-form-label">Description:</label>
					<textarea rows="5" class="form-control" id="description" name="description" id="address"></textarea>
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
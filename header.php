<!DOCTYPE html>
<html lang="en">
<head>
	<title>Task</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	  <!-- Add icon library -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">		
	<style>
		.navbar-custom {
			background-color:#339966;
		}

		/* change the brand and text color */
		.navbar-custom .navbar-brand,
		.navbar-custom .navbar-text {
			color: rgba(255,255,255,.8);
			font-size:20px;
		}

		/* change the link color */
		.navbar-custom .navbar-nav .nav-link {
			color: rgba(255,255,255,.5);
			padding-left:70px;
		}

		/* change the color of active or hovered links */
		.navbar-custom .nav-item.active .nav-link,
		.navbar-custom .nav-item:hover .nav-link {
			color: #ffffff;
		} 

		/* for dropdown only - change the color of droodown */
		.navbar-custom .dropdown-menu {
			background-color:#339966;
		}
		.navbar-custom .dropdown-item {
			color: #ffffff;
		}
		.navbar-custom .dropdown-item:hover,
		.navbar-custom .dropdown-item:focus {
			color: #333333;
			background-color: rgba(255,255,255,.5);
		}
		 .navbar-custom .navbar-nav .dropdown-menu
		 {
			 margin-left:45px;
		 }
				    
		#mylogin
		{
			margin-right:50px;
		}	
		
		@media only screen and (max-width: 600px) 
		{		
			.navbar-custom .navbar-brand,
			.navbar-custom .navbar-text {
				color: rgba(255,255,255,.8);
				font-size:14px;
			}		
			.navbar .navbar-nav .nav-link
			{
				padding-left:0px;
			}	
			.navbar-custom .navbar-nav .dropdown-menu
			{
			 margin-left:0px;
			}
			
		}		
	</style>
</head>
<?php
	include "connect.php";
?>
<body>
	<nav class="navbar navbar-expand-sm navbar-custom">
		<a href="#" class="navbar-brand"><b>Task</b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCustom">
			<i class="fa fa-bars fa-lg py-1 text-white"></i>
		</button>
		<div class="navbar-collapse collapse" id="navbarCustom">
			<ul class="navbar-nav">
				<?php
					if($_SESSION["status"]=="admin")
					{
				?>
					<li class="nav-item <?php if($current_page=="customerregistration") echo "active"; ?>">
						<a class="nav-link" href="customerregistration.php"><b>CUSTOMER REGISTRATION</b></a>
					</li>				
					<li class="nav-item <?php if($current_page=="managecustomer") echo "active"; ?>">
						<a class="nav-link" href="managecustomer.php"><b>MANAGE CUSTOMER</b></a>
					</li>	
					<li class="nav-item dropdown <?php if($current_page=="logingeneration"){ echo "active"; }?>">
					  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><b>LOGIN GENERATION</b></a>
					  <div class="dropdown-menu">
						<a class="dropdown-item" href="logingeneration.php">GENERATION</a>
						<a class="dropdown-item" href="managegeneration.php">MANAGE LOGIN</a>
					  </div>
					</li>		
					<li class="nav-item <?php if($current_page=="managecomplaint") echo "active"; ?>">
						<a class="nav-link" href="managecomplaint.php"><b>MANAGE COMPLAINTS</b></a>
					</li>																					
				<?php
					}
					else if($_SESSION["status"]=="user")
					{
				?>
					<li class="nav-item <?php if($current_page=="customercomplaint") echo "active"; ?>">
						<a class="nav-link" href="customercomplaint.php"><b>CUSTOMER COMPLAINTS</b></a>
					</li>				
				<?php
					}
				?>
			</ul>
			<span class="ml-auto">
				<ul class="navbar-nav">
					  <?php 
						if($_SESSION["name"]!="")
						{
					  ?>
						  <li class="nav-item dropdown active" id="mylogin">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							 <i class="fas fa-user-cog"></i> <?php echo $_SESSION["name"]; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							  <a class="dropdown-item" href="logout.php">LOGOUT</a>
							</div>
						  </li>
					<?php	
						}
						else
						{
					?>
						  <li class="nav-item dropdown active" id="mylogin">
							<a class="nav-link" href="login.php"><i id="iconlogin" class="fal fa-sign-in"></i> <b>LOGIN</b></a>
						  </li>						
					<?php
						}
					?>			
				</ul>
			</span>
		</div>
	</nav>
	<div class="container-fluid mt-3 mb-3">
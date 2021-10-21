<?php

	include "sessioncheck.php";
	$current_page="managecustomer";
	include "header.php";
	include "connect.php";
	
	echo '<datalist id="customerzipcode">';
	$res11=mysql_query("select distinct(zipcode) from customer",$con);
	for(;$row11=mysql_fetch_array($res11);)
	{
		echo '<option>' . $row11["zipcode"] . '</option>';
	}
	echo '</datalist>';
?>
<style>
	#heading
	{
		color:#339966;
		text-align:center;
	}
	.thead
	{
		background-color:#339966;
		color:#fff;
		text-align:center;
	}
	#data
	{
		text-align:center;
	}
</style>
	<h3 id="heading">MANAGE LOGIN GENERATION</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-sm">
			<thead class="thead">
				<tr>
					<th>S.No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Password</th>
					<!--th>Edit</th>
					<th>Delete</th-->
				</tr>
			</thead>
			<?php
			
				$result=mysql_query("select * from login where status='user'",$con);
				for($i=1;$row=mysql_fetch_array($result);)
				{
					$res11=mysql_query("select * from customer where id='" . $row["cid"] . "'",$con);
					$row11=mysql_fetch_array($res11);
			?>
			<tbody id="data">
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row11["firstname"]; ?></td>
					<td><?php echo $row11["lastname"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["password"]; ?></td>	
					<!--td><a class="btn btn-info btn-sm edit" myid="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#crudmodal">Edit</a></td>
					<td><a class="btn btn-danger btn-sm delete" did="<?php echo $row["id"]; ?>">Delete</a></td-->
				</tr>
			</tbody>
			<?php	
				}
			?>
		</table>
	</div>
<!-- Model -->
<div class="modal fade" tabindex="-1" role="dialog" id="crudmodal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="myModel">
				<div class="modal-header">
					<h4 class="modal-title">EDIT CUSTOMER DETAILS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-form-label">First Name:</label>
						<input type="text" class="form-control" id="firstname" name="firstname">
					</div>	
					<div class="form-group">
						<label class="col-form-label">Last Name:</label>
						<input type="text" class="form-control" id="lastname" name="lastname">
					</div>		
				<div class="form-group">
					<label class="col-form-label">Gender:</label>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" id="male" name="gender" value="Male">Male
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" id="female"  name="gender" value="Female">Female
					  </label>
					</div>
				</div>						
					<div class="form-group">
						<label class="col-form-label">Address:</label>
						<textarea rows="3" class="form-control" id="address" name="address"></textarea>
					</div>					
					<div class="form-group">
						<label class="col-form-label">Zipcode:</label>
						<input type="number" class="form-control" id="zipcode" name="zipcode">
					</div>		
					<div class="form-group">
						<label class="col-md-label">Email:</label>
						<input type="email" class="form-control" id="emailid" name="emailid">
					</div>	
					<div class="form-group">
						<label class="col-form-label">Mobile:</label>
						<input type="number" class="form-control" id="mobile" name="mobile">
					</div>		
				</div>				
				<div class="modal-footer">
					<div class="form-group">
						<input type="hidden" name="hid" id="hid"/>
						<button type="button" class="btn btn-primary" name="update" id="update">Update</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>									
					</div>			
				</div>
			</form>
		</div>
	</div>
</div>
	<script>
		$(document).ready(function(){	

			$('#crudmodal').modal({
				backdrop:"static",
				keyboard:true,
				show:false
			});
			
			$('#search').on('keyup',function(){
				var value=$(this).val().toLowerCase();
				$('#data tr').filter(function(){
					$(this).toggle($(this).text().toLowerCase  ().indexOf(value)>-1)
				});
			});				
			
			$('.edit').on('click',function(){
				var eid=$(this).attr('myid');
				//alert(eid);
				$.ajax({
					type: "POST",
					url: "db/selectcustomer.php",
					data: "editid="+eid,
					dataType: "JSON",
					success:function(response){
						//console.log(response);
						$('#firstname').val(response.firstname);
						$('#lastname').val(response.lastname);
						if(response.gender=="Male")
						{
							$('#male').prop("checked",true);
						}
						else
						{
							$('#female').prop("checked",true);
						}
						$('#address').val(response.address);
						$('#zipcode').val(response.zipcode);
						$('#emailid').val(response.email);
						$('#mobile').val(response.mobile);
						$('#hid').val(response.id);
					}
				});
			});

			$('#update').on('click',function(){
				var hid=$('#hid').val();
				var firstname=$('#firstname').val();
				var lastname=$('#lastname').val();
				var gender=$('input:radio[name=gender]:checked').val();
				var address=$('#address').val();
				var zipcode=$('#zipcode').val();
				var emailid=$('#emailid').val();				
				var mobile=$('#mobile').val();
				var datastring="hid="+hid+"&firstname="+firstname+"&lastname="+lastname+"&gender="+gender+"&address="+address+"&zipcode="+zipcode+"&emailid="+emailid+"&mobile="+mobile;					
				//alert(datastring);
				$.ajax({
					type: "POST",
					url: "db/updatecustomer.php",
					data: datastring,
					dataType: "JSON",
					success: function(response){
						//console.log(response);
						if(response==1)
						{
							alert("Customer Details Updated Successfully");
							window.location.href="managecustomer.php";
						}
						else
						{
							alert("Please Fill the Details");
						}
					}
				});
			});
		
			$('.delete').on('click',function(){
				var delid=$(this).attr('did');
				//alert(delid);
				var checkstr = confirm('Do you want to delete?');
				if(checkstr == true)
				{
					$.ajax({
						type: "POST",
						url: "db/deletecustomer.php",
						data: "deleteid="+delid,
						dataType: "JSON",
						success: function(response){
							//console.log(response);
							if(response==1)
							{
								alert("Customer Details Deleted Successfully");
								window.location.href="managecustomer.php";
							}
						}
					});
				}
				else
				{
					return false;
				}
			});			
		});
	</script>
<?php

	include "footer";
?>
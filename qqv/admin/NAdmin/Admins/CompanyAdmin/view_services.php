<?php
include("../../../../includes/Company_admin_header.php");
$company_id   	=$_SESSION['Company_ID'];
$path          ="../upload/";
// if (isset($_POST['submit'])) {
// 	$ServiceName		=$_POST['service_name'];
// 	$ServiceCost        =$_POST['service_COST'];
// 	$serviceType        =$_POST['SERVICE_type'];
// 	$serviceImage       =$_FILES['photo']['name'];
// 	$tmp_name      	    =$_FILES['photo']['tmp_name'];


// 	move_uploaded_file($tmp_name,$path.$serviceImage);

// 	$query="INSERT INTO  services (service_name,service_cost,type_id,service_image,company_id) VALUES ('$ServiceName','$ServiceCost','$serviceType','$serviceImage','$company_id')";
	

// 	mysqli_query($conn,$query);
// 	header("location:manage_services.php");


// }



// $row=mysqli_fetch_assoc($result)








?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	

		<!-- ============================================================== -->
		<div class="container-fluid">

			<div class="col-12">

				<div class="card">
					<div class="card-body">
							<div class="  col-12" >
				
					
						
							
								
								
								<div class="col-12  form-group">
									<head>
										<script src="../ajax.js"></script>
										<script type="text/javascript">
											$(document).ready(function()
											{
												$("#typeID").change(function()
												{
                    //get selected parent option 
                    var type_id = $("#typeID").val();
                    //alert(admin_id);
                    $.ajax(
                    {
                    	type: "GET",
                    	url: "names.php?type_id=" + type_id,
                    	success: function(data)
                    	{
                    		$("#names").html(data);

                    	}
                    });
                });

											});
										</script>
										<?php 

										$result = mysqli_query($conn, "SELECT * FROM services_type");
										while($row = mysqli_fetch_array($result)){
											$userSet[] = $row;
										}
										?>        
									</head>
								  
									
										
										<form  action="view_services.php" method="post">
											<select class=" col-12 custom-select custom-select-lg " name='typeID' id='typeID'>
												<option disabled="" selected="" >SELECT TYPE TO SHOW SERVICES</option>
												<?php
												foreach ($userSet as $key => $value) {
													echo "<option value='{$value['type_id']}'>{$value['type_name']}</option>";
												}
												?>
												<option  value="all">SHOW ALL SERVICES</option>
											</select>
										
										</form> 
										
									
									

									
								</div>


							
							


						
					</div>
							
						<div class="table-responsive m-t-20">
<table class=" text-center  table table-bordered  table-hover  table-responsive-lg" id="names" >


	


<thead>
<tr>
<th scope='col-6'>#</th>
<th scope='col'>Photo</th>
<th scope='col'>Sevice Name</th>
<th scope='col'>Sevice Cost</th>


<th scope='col'>Edit</th>
<th  scope='col'>Delete</th>

</tr>
</thead>
<tr> <td class='text-center' colspan='8' >  PLEASE SELECT TYPE </td></tr>


 </table>
						</div>

					</div>
				</div>
			</div>

			<!-- ============================================================== -->
			<!-- End Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->


		</div>
	</div>
	<?php
	include("../../../../includes/admin_footer.php");

	?>
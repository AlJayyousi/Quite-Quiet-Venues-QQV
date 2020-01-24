<?php
include("../../../../includes/Company_admin_header.php");
$company_id   	=$_SESSION['Company_ID'];
$path          ="../upload/";
if (isset($_POST['submit'])) {
	$ServiceName		=$_POST['service_name'];
	$ServiceCost        =$_POST['service_COST'];
	
	$query="INSERT INTO  services (service_name,service_cost,company_id) VALUES ('$ServiceName','$ServiceCost','$company_id')";
	

	mysqli_query($conn,$query);
	header("location:manage_services.php");


}



// $row=mysqli_fetch_assoc($result)








?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-12">
					<div class="card card-body">
						<h4 class="card-title">ADD NEW SERVICE</h4>
						<form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
							<div class="row" >
								<div class="col-6 form-group">
									<label>SERVICE NAME</label>
									<input type="text" class="form-control" required="" name="service_name" >
								</div>
								<div class="col-6 form-group">
									<label>SERVICE COST</label>
									<input type="float"  class="form-control" required="" name="service_COST" >
								</div>
								

							</div>
							<div class="form-group col-12 text-center  ">

								<button type="submit " name="submit" class=" mt-2 col-4 btn btn-success" name="ADD"  > ADD </button>

							</div>



						</form>
					</div>
				</div>
			</div>


			<!-- ============================================================== -->
			<!-- End Container fluid  -->
			<!-- ============================================================== -->
		</div>

		<!-- ============================================================== -->
		<div class="container-fluid">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive m-t-20">
							<table class=" text-center  table table-bordered  table-hover  table-responsive-lg">
								<thead>
									<tr>
										<th scope="col-6">#</th>
										<th scope="col">Sevice Name</th>
										<th scope="col">Sevice Cost</th>
										

										<th scope="col">Edit</th>
										<th style="l" scope="col">Delete</th>

									</tr>
								</thead>

								<tbody>

									<?php

									$query   ="SELECT *
									FROM services
									WHERE company_id = $company_id";


									$result  = mysqli_query($conn,$query);


									$counter=1;
									while ($row=mysqli_fetch_assoc($result)) {
										


										echo "<tr>"; 
										echo "<td>  $counter </td>";
										

										echo "<td> {$row['service_name']} </td>";
										echo "<td> {$row['service_cost']} $</td>";


// $ID= base64_encode(($row['service_id']+0.333)*31);
// $ID=base64_encode($ID);
// $real=base64_decode($ID)/31-0.333;






										echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:40px' class='btn  btn-success'  href='Edit_service.php?serviceID={$row['service_id']}' ><b> EDIT<b></a></td>";  
										echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:40px' class='btn btn-danger' href='delete_service.php?serviceID={$row['service_id']}' ><b> DELETE<b></a></td>";



										$counter++;
										echo "</tr>"; 

									}
									if($counter==1){ echo "<td class='text-center' colspan='8' >  EMPTY </td>";   echo "</tr>"; }
									?>
								</tbody>
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
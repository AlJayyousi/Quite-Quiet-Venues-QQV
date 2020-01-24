<?php



include("../../../../includes/Company_admin_header.php");
$company_id   	=$_SESSION['Company_ID'];




$path          ="../upload/";
if (isset($_POST['submit'])) {
		$TorR     		    =$_POST['RorT'];
if ($TorR==1) {
		$Name				="Room  : ".$_POST['name'];
}
else $Name				="Table  : ".$_POST['name'];
	
	$Cost      		    =$_POST['cost'];
	$sizee     		    =$_POST['sizee'];
	$Description        =$_POST['RTdesc'];
	$Image   		    =$_FILES['photo']['name'];
	$tmp_name      	    =$_FILES['photo']['tmp_name'];


	move_uploaded_file($tmp_name,$path.$Image);

	$query="INSERT INTO  rooms_and_tables (name,cost,is_Room,size,image,company_id,Description) VALUES ('$Name','$Cost','$TorR','$sizee','$Image','$company_id','$RTdesc')";
	

	mysqli_query($conn,$query);
	
	header("location:manage_roomsAndTables.php");


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
						
						<form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
							<div class="row">
								<label>  <h3> ADD NEW</h3> </label> 
							<div class="col-2 form-group">
								
									
									<select class="custom-select custom-select-lg mb-3" name="RorT">


										<option value="1" >ROOM</option>
										<option value="0" >TABLE</option>

										?>
									</select>
								</div>
							</div>
							<div class="row" >
								<div class="col-6 form-group">
									<label> NAME</label>
									<input type="text" class="form-control" required="" name="name" >
								</div>
									<div class="col-6 form-group">
										<label> COST</label>
										<input type="number" class="form-control" required="" name="cost" >
									</div>
									<div class="col-6 form-group">
										<label> SIZE</label>
										<input type="number" class="form-control" required="" name="sizee" >
									</div><div class="col-6 form-group">
										<label> Description</label>
										<input type="text" class="form-control" required="" name="RTdesc" >
									</div>
								




								<div class=" col-6 form-group">
									<label> PHOTO</label>
									<input name="photo" required="" type="file" class="form-control">
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
										<th scope="col">Photo</th>
										<th scope="col">Name</th>
										<th scope="col">Cost</th>
										<th scope="col">size</th>
										<th scope="col">Description</th>

										<th scope="col">Edit</th>
										<th style="l" scope="col">Delete</th>

									</tr>
								</thead>

								<tbody>

									<?php

									$query   ="SELECT * FROM rooms_and_tables WHERE Company_ID={$_SESSION['Company_ID']}";
									$result  = mysqli_query($conn,$query);

									$counter=1;
									while ($row=mysqli_fetch_assoc($result)) {
										echo "<tr>"; 
										echo "<td>  $counter </td>";
										echo "<td style='height:122px; background-image:url($path{$row['image']}) ;background-repeat:no-repeat; background-position: center;background-size: cover ' > </td>";

										echo "<td> ";




echo "
										 {$row['name']} </td>";
										echo "<td> {$row['cost']} </td>";
										echo "<td> {$row['size']} </td>";
										echo "<td style='max-width: 200px '> {$row['Description']} </td>";



										echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn  btn-success'  href='Edit_RT.php?ID={$row['id']}&imageName=$path{$row['image']}' ><b> EDIT<b></a></td>";  
										echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn btn-danger' href='deleteRT.php?ID={$row['id']}&imageName=$path{$row['image']}' ><b> DELETE<b></a></td>";



										$counter++;
										echo "</tr>"; 

									}
									if($counter==1){ echo "<td class='text-center' colspan='7' >  EMPTY </td>";   echo "</tr>"; }
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
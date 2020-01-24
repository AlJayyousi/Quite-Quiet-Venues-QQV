<?php  


include("includes/public_header.php");

if(!isset($_SESSION['customer_id'])){

header("location:loginAndRegister.php");

exit();
}

if (isset($_POST['Update'])) {
	$CName           =$_POST['Name'];
	$Email           =$_POST['Email'];
	$Mobile          =$_POST['Mobile'];

	$Password        =$_POST['Pass'];
  


if ($Password!='') {
		$query="UPDATE customer SET customer_name     ='$CName',
                          		    customer_email    ='$Email',
                           		    customer_mobile   ='$Mobile',
                           		    customer_password ='$Password'

  
    WHERE customer_id = {$_SESSION['customer_id']}";
	}
	else{
  $query="UPDATE customer SET customer_name   ='$CName',
                              customer_email  ='$Email',
                              customer_mobile ='$Mobile'

  
    WHERE customer_id = {$_SESSION['customer_id']}";
  }

mysqli_query($conn,$query);

header("location:Profile.php?Update=1

");
exit();
}

 ?>
<style type="text/css"> body{background-image: url(images/home_slider.jpg)}</style>
					<div  class="background_image " style="background-image:url(images/home_slider.jpg)"></div>
<div  style="" class="container ">
							<div  class="row">
								<div class="col">
									<div  class="p-3 home_slider_content">
										<div style="" class="home_title"><h2> &nbsp; </h2></div>
										<div style="color: white;text-align: center;" class="home_title"><h3>
<?php 
if (isset($_GET['Update'])) {
		echo "<span style='color:#00ff00'>Your Information has been Updated.</span>";
 "string";
}
elseif (isset($_GET['Message'])) {
if ($_GET['Message']=='d') {
	echo "<span style='color:red'>The reservation has been Canceled.</span>";}
		echo "<span style='color:black'>The reservation has been confirmed.</span>";

}

else{echo "&nbsp;";}



?>



										</h3></div>
									</div>
								</div>
							</div>
						</div><div class="page-breadcrumb">
<div class="container-fluid " >
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive m-t-20">
							<table  class=" text-center  table table-bordered  table-hover  table-responsive-lg">
								<thead>
									<tr>
										
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Mobile</th>
										<th scope="col">Password</th>
									
									
										

										
										<th style="l" scope="col">Update</th>
										<!-- <th style="l" scope="col  ">LOGOUT</th> -->

									</tr>
								</thead>

								<tbody>
<form method="post">
									<td class="p-0">
										
<input  value="<?php echo($rowL['customer_name']); ?>" style="height: 50px;border: none;text-align: center;" class="col-12" type="text" name="Name">
									</td><td class="p-0">
										
<input value="<?php echo($rowL['customer_email']); ?>" style="height: 50px;border: none;text-align: center;" class="col-12" type="text" name="Email">
									</td><td class="p-0">
										
<input value="<?php echo($rowL['customer_mobile']); ?>" style="height: 50px;border: none;text-align: center;" class="col-12" type="text" name="Mobile">
									</td>
									<td class="p-0">
										
<input style="border: none;text-align: center;height: 50px;" class="col-12" type="text" name="Pass" placeholder="new Password">
									</td>

	

	 <td   		 class='p-0' ><button class="btn btn-success " type="submit" name="Update"  style="height: 50px;width: 100%" >UPDATE</button></td>
<a class="btn btn-info text-white  p-0 "  href="LOGOUT.php"  style=" line-height: 50px;width: 100%" ><b>LOGOUT</b></a>




								</form>


									</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
										<div class="home_title"><div class="container-fluid">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive m-t-20">
							<table class=" text-center  table table-bordered table-striped  table-responsive-lg">
								<thead>
									<tr>
										<th scope="col-6">#</th>
										<th scope="col">Company Name</th>
										<th scope="col">Date</th>
										<th scope="col">Start Time</th>
										<th scope="col">End Time</th>
										<th scope="col">Paied</th>
										<th scope="col">Request ID</th>
										

										
										<th style="l" scope="col">CANCEL</th>

									</tr>
								</thead>

								<tbody>


									<?php
if(!isset($_SESSION['customer_id'])){

header("location:Login_v9/login.php");

exit();
}
									$query   ="SELECT *
									FROM customers_request INNER JOIN companies ON customers_request.Company_ID=companies.Com_id 
									WHERE customer_id = {$_SESSION['customer_id']} AND Book_date >= CURDATE()  ORDER BY `customers_request`.`request_id` DESC  " ;


									$result  = mysqli_query($conn,$query);


									$counter=1;
									while ($row=mysqli_fetch_assoc($result)) {
										


										echo "<tr>"; 
										echo "<td>  $counter </td>";
										

										echo "<td> {$row['Com_name']} </td>";
										echo "<td> {$row['Book_date']} </td>";
										echo "<td>" .substr($row['Start_time'],0,-3)." </td>";
										echo "<td>" .substr($row['end_time'],0,-3)." </td>";

										echo "<td> {$row['Total_amount']} $</td>";
										echo "<td> {$row['request_id']} </td>";


// $ID= base64_encode(($row['service_id']+0.333)*31);
// $ID=base64_encode($ID);
// $real=base64_decode($ID)/31-0.333;






										
										echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:40px' class='btn btn-danger' href='includes/CancelR.php?rID={$row['request_id']}' ><b> CANCEL<b></a></td>";



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

		</div></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				

				<!-- Slide -->
				

			</div>

			
  </div>
	<!-- Search -->
	
       

	<!-- Testimonials -->

	

	<!-- News -->

	
 <?php 

include("includes/public_footer.php");


 ?>
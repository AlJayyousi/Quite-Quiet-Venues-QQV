<?php include("../../../../includes/Company_admin_header.php");
$company_id   	=$_SESSION['Company_ID'];
$path          ="../upload/";
?>


<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div  class="page-breadcrumb">
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

										<th scope="col">Edit</th>
										<th style="l" scope="col">Delete</th>

									</tr>
								</thead>

								<tbody>

									<?php

									$query   ="SELECT * FROM rooms_and_tables WHERE is_Room =0 AND  Company_ID={$_SESSION['Company_ID']}";
									$result  = mysqli_query($conn,$query);

									$counter=1;
									while ($row=mysqli_fetch_assoc($result)) {
										echo "<tr>"; 
										echo "<td>  $counter </td>";
										echo "<td style='height:122px; background-image:url($path{$row['image']}) ;background-repeat:no-repeat; background-position: center;background-size: cover ' > </td>";

											echo "<td> ";
 $last_word_start = strrpos($row['name'], ':') + 1; // +1 so we don't include the space in our result
$last_word = substr($row['name'], $last_word_start);

 echo $last_word."</td>";
										echo "<td> {$row['cost']} </td>";
										echo "<td> {$row['size']} </td>";



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



</div></div>






<?php
include("../../../../includes/admin_footer.php");

?>
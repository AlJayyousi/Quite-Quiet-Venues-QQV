<?php
include("../../../../includes/Company_admin_header.php");
$company_id   	=$_SESSION['Company_ID'];







// $row=mysqli_fetch_assoc($result)








?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		

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
										<th scope="col">Customer Name</th>
										<th scope="col">Room And Tables Name</th>
										<th scope="col">Date</th>
										<th scope="col">Start Time</th>
										<th scope="col">End Time</th>
										<th scope="col">Notes</th>
										<th scope="col">Paied</th>
										<th  scope="col">ID</th>
										<th  scope="col">X</th>

									</tr>
								</thead>

								<tbody>
									<?php

									$query   ="SELECT * FROM rooms_and_tables INNER JOIN customers_request ON rooms_and_tables.Company_ID=customers_request.Company_ID WHERE customers_request.Company_ID={$_SESSION['Company_ID']} GROUP BY customers_request.request_id ORDER BY `customers_request`.`Book_date` DESC";

									$result  = mysqli_query($conn,$query);

									$counter=1;
									while ($row=mysqli_fetch_assoc($result)) {
										echo "<tr   >"; 
										echo "<td>  $counter </td>";
										echo "<td >  {$row['Name']} </td>";
										

										
										echo "<td> ";

if ($row['is_Room']==1) {
	echo "ROOM : ".$row['RT_Name'];
}
else
echo "TABLE : ".$row['RT_Name'];

echo "
									</td>";
										
										echo "<td> {$row['Book_date']} </td>";

										echo "<td>" .substr($row['Start_time'],0,-3)." </td>";
										echo "<td>" .substr($row['end_time'],0,-3)." </td>";

											echo "<td style='max-width: 200px '> {$row['Notes']} </td>";
										echo "<td> {$row['Total_amount']} $</td>";
										echo "<td  > {$row['request_id']} </td>";
										
									



										
										echo " <td style='' ';  class='p-0 ' ><a style='width: 100%;line-height:100px;
    white-space: nowrap;

										 ' class='btn btn-danger' href='../../../../includes/CancelR.php?rID={$row['request_id']}' ><b> X<b></a></td>";



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
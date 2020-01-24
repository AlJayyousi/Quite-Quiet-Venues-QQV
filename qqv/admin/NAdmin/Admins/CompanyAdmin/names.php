

<?php
$counter=1;
session_start();
$company_id   	=$_SESSION['Company_ID'];
$path          ="../upload/";
$conn = mysqli_connect("localhost","root","","qqp");
if ($_GET['type_id']=="all") {
	$query   ="SELECT *
FROM services WHERE company_id = $company_id  ";
}
else{
$query   ="SELECT *
FROM services WHERE
type_id	={$_GET['type_id']} ";}
$result = mysqli_query($conn, $query);
echo "<table class='  text-center  table table-bordered  table-hover  table-responsive-lg'  > 


<thead>
<tr>
<th scope='col-6'>#</th>
<th scope='col'>Photo</th>
<th scope='col'>Sevice Name</th>
<th scope='col'>Sevice Cost</th>


<th scope='col'>Edit</th>
<th  scope='col'>Delete</th>

</tr>
</thead> <tbody>";	

while ($row=mysqli_fetch_assoc($result)) {

	





	echo "<tr>"; 
	echo "<td> $counter </td>";
	echo "<td style='height:122px; background-image:url($path{$row['service_image']}) ;background-repeat:no-repeat; background-position: center;background-size: cover ' > </td>";

	echo "<td> {$row['service_name']} </td>";
	echo "<td> {$row['service_cost']} </td>";
	



	echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn  btn-success'  href='Edit_service.php?serviceID={$row['service_id']}&imageName=$path{$row['service_image']}' ><b> EDIT<b></a></td>";  
	echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn btn-danger' href='delete_service.php?serviceID={$row['service_id']}&imageName=$path{$row['service_image']}' ><b> DELETE<b></a></td>";



	$counter++;
	echo "</tr> "
	; 


}
if($counter==1){ echo " <tr> <td class='text-center' colspan='8' >  EMPTY </td>";   echo "</tr>"; }
echo "</tbody>
</table>  ";

?>


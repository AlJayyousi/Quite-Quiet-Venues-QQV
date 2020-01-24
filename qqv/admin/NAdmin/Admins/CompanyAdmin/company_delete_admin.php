<?php 
include("../../../../includes/Company_admin_header.php");

// include("../../../../includes/connection.php");
if ($row['Company_ID']!=$company_id||$row['Com_Admin_master']!=1) {
header("location:index.php");
}
 $path          ="upload/";
 $imageNAme=$_GET['imageName'];
 $query  ="DELETE  FROM com_admins WHERE Com_Admin_ID = {$_GET['adminID']}";

  mysqli_query($conn,$query);
  if ($imageNAme!=$path) {
       unlink($imageNAme);
      }


  header("location:manage_company_admin.php");
  

 ?>
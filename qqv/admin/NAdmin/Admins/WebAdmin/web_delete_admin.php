<?php 
include("../../../../includes/admin_header.php");
	if( $row['admin_master']!=1){
    header("location:index.php");

}
 $path          ="upload/";
 $imageNAme=$_GET['imageName'];
 $query  ="DELETE  FROM web_admin WHERE web_admin_id = {$_GET['WEBadminID']}";

  mysqli_query($conn,$query);
  if ($imageNAme!=$path) {
       unlink($imageNAme);
      }


  header("location:manage_web_admin.php");

 ?>
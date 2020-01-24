<?php 
include("../../../../includes/connection.php");
 $path          ="upload/";
 $imageNAme=$_GET['imageName'];
 $query  ="DELETE  FROM services WHERE service_id = {$_GET['serviceID']}";

  mysqli_query($conn,$query);
  if ($imageNAme!=$path) {
       unlink($imageNAme);
      }


  header("location:manage_services.php");

 ?>
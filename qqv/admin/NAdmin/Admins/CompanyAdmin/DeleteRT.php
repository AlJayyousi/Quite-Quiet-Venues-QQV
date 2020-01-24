<?php 
include("../../../../includes/connection.php");
 $path          ="upload/";
 $imageNAme=$_GET['imageName'];
 $query  ="DELETE  FROM rooms_and_tables WHERE id = {$_GET['ID']}";

  mysqli_query($conn,$query);
  if ($imageNAme!=$path) {
       unlink($imageNAme);
      }


	header("location:manage_roomsAndTables.php");

 ?>
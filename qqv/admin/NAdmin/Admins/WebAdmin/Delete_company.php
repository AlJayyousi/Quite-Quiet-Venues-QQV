<?php 
include("../../../../includes/connection.php");
 $path          ="upload/";
 $imageNAmeO=$_GET['imageNameO'];
 $imageNAmeC=$_GET['imageNameC'];
 $queryA  ="DELETE  FROM companies WHERE Com_id = {$_GET['comID']}";
 $queryB  ="DELETE  FROM com_admins WHERE Company_ID = {$_GET['comID']}";
 $queryC  ="DELETE  FROM contactus WHERE company_id = {$_GET['comID']}";
 $queryD  ="DELETE  FROM customers_request WHERE Company_ID = {$_GET['comID']}";
 $queryE  ="DELETE  FROM rooms_and_tables WHERE company_id = {$_GET['comID']}";
 $queryF  ="DELETE  FROM services WHERE company_id = {$_GET['comID']}";

  mysqli_query($conn,$queryA);
  mysqli_query($conn,$queryB);
  mysqli_query($conn,$queryC);
  mysqli_query($conn,$queryD);
  mysqli_query($conn,$queryE);
  mysqli_query($conn,$queryF);
  if ($imageNAme!=$path) {
       unlink($imageNAmeO);
       unlink($imageNAmeC);
      }


  header("location:View_companies.php");

 ?>
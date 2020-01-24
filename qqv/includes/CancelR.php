<?php
include_once('connection.php');
$rID=$_GET['rID'];



$query="DELETE  FROM customers_request WHERE request_id='$rID' ";
mysqli_query($conn,$query);
    // $url = $_SERVER['HTTP_REFERER'].split('?')[0];
$Url = $_SERVER['HTTP_REFERER'];    
$BackToUrl = strtok($Url, '?').'?Message=d';

 header('Location: '.$BackToUrl);


?>
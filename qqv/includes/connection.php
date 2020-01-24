<?php
include('config.php');
$conn=mysqli_connect(DBSERVER,DBUSER,DBPASS,DBNAME);

if(!$conn){
	die("cannot conncet to server");
}

?>
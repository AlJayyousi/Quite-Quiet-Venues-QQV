<?php 

$note="I NEED ";

$arrayName = array() ;


for ($i=0; $i <count($arrayName) ; $i++) { 
	$note.=$arrayName['id']." AND ";
}
echo count($arrayName);
 ?>



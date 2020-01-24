
<?php


session_start();
$SID     	=$_GET['SID'];
$sCost      =$_GET['sCost'];
$Notes      =$_GET['Notes'];
$Check      =$_GET['checked'];

if ($Check=='true') {
	
	 $_SESSION['ServiceList'][]=array("id"=>$SID,"Cost"=>$sCost,"Noote"=>$Notes) ;


}

else{
foreach($_SESSION['ServiceList'] as $subKey => $subArray){
      
        if($subArray['id'] == $SID)
        {
        	unset($_SESSION['ServiceList'][$subKey]);
         	$_SESSION['ServiceList'] = array_values($_SESSION['ServiceList']);
} 


}
    }

    
$cost=0;
for ($i=0; $i <count($_SESSION['ServiceList']) ; $i++) { 
	$cost+=$_SESSION['ServiceList'][$i]['Cost'];
	
}

// print_r( $_SESSION['ServiceList']);

echo "$cost";


?>
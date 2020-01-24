<?php
$conn = mysqli_connect("localhost","root","","qqp");

$ComID          =$_GET['ComID'];
$BookOnDate     =$_GET['BokDate'];

$isROom         =$_GET['RorT'];
$Start_time     =$_GET['startTime'];
$duration       =$_GET['duration'];
    $StartHOUR      =substr($Start_time, 0, 2); // returns "d"
    $StartMinutes   =substr($Start_time, 2, 3); // returns "d"
    $EndTime        =$StartHOUR+$duration.$StartMinutes;

$timeQuery   ="SELECT CURDATE()";
$timeResults =mysqli_query($conn,$timeQuery);
$rowT      =mysqli_fetch_assoc($timeResults);


$queryZ="SELECT * FROM companies WHERE com_id= {$_COOKIE['ComId']}";
$resultZ = mysqli_query($conn,$queryZ);
$rowZ=mysqli_fetch_assoc($resultZ);



$today =$rowT['CURDATE()']; 
if ($_GET['BokDate']<$today) {


  echo "<div class='alert alert-primary' role='alert'>
 PLEASE CHOSE A REAL DATE
</div>";
die();    

}
$OpenTime =substr($rowZ['com_opening_time'],0,-3);
if ($_GET['startTime']<$OpenTime) {
   echo "<div class='alert alert-primary' role='alert'>
 SORRY WE OPEN AT $OpenTime
</div>";
// echo " SORRY WE OPEN AT ".$OpenTime;
die();    

}
$close =substr($rowZ['com_closing_time'],0,-3);
if ($EndTime>$close) {
 echo "<div class='alert alert-primary' role='alert'>
 SORRY WE CLOSE AT $close;
</div>";die();    

} 
if ($EndTime<=($OpenTime)) {
 echo "<div class='alert alert-primary' role='alert'>
 MINIMUM RESERVATION IS ONE HOUR
</div>";die();    

} 




$path="../admin/NAdmin/Admins/upload/";
$counter=1;
session_start();

$Size=10;

if (($_GET['TRsize'])!='null') {
 $Size =$_GET['TRsize'];
}

   


    // echo "$EndTime";
    
$SizeQuery = array(0 => 'size BETWEEN 2 AND 9 ',
                    1 => 'size BETWEEN 10 AND 14 ',
                    2 => 'size BETWEEN 15 AND 19 ',
                    3 => 'size BETWEEN 20 AND 24 ',
                    4 => 'size BETWEEN 25 AND 30 ',
                    5 => 'size > 30 ',
                    6 => 'size = 1 ',
                    7 => 'size = 2 ',
                    8 => 'size = 3 ',
                    9 => 'size = 4 ',
                    10 => 'size > 0 '
                      );
$_SESSION['details']=array("BookOnDate"=>$BookOnDate,"Start_time"=>$Start_time,"duration"=>$duration,"EndTime"=>$EndTime) ;

// 

 $queryAll="SELECT * FROM rooms_and_tables WHERE Company_id=$ComID AND  is_Room=$isROom AND $SizeQuery[$Size]";

$queryTAken="SELECT Room_Table_id FROM   customers_request    WHERE Book_date='$BookOnDate' AND 
(
(Start_time <= '$Start_time' AND end_time > '$Start_time')
OR (Start_time < '$EndTime' AND end_time > '$EndTime') 
OR ('$Start_time' <= Start_time AND Start_time < '$EndTime')
OR ('$Start_time' < end_time AND end_time <= '$EndTime')
)";

 //  echo "$queryAll <br>------------------------";
 // echo "$queryTAken";

$resultQT  = mysqli_query($conn,$queryTAken);
 $resultALL  = mysqli_query($conn,$queryAll);

while ($rowQT=mysqli_fetch_assoc($resultQT)) {$Taken[] = $rowQT;}
while ($rowALL=mysqli_fetch_assoc($resultALL)){ $AlltR[] = $rowALL;}
 
 
if (isset($Taken)&&isset($AlltR))  {
    // print_r($Taken);


 
 // echo "<pre>";

// echo("---------".'<br>');

for ($i=0; $i <=count($Taken)-1 ; $i++) { 
    foreach($AlltR as $subKey => $subArray){
        
        if($subArray['id'] == $Taken[$i]['Room_Table_id'])
        {unset($AlltR[$subKey]);} }
    }
      foreach($AlltR as $subKey => $subArray){
             
          
 echo "<div class='border  pl-0 col single-room-area d-flex align-items-center mb-50 wow fadeInUp' data-wow-delay='200ms'>
                       <!-- Room Thumbnail -->
                       <div class='room-thumbnail'>
                       <img style='width: 100% ;height: 200px' src='$path{$subArray['image']}' alt=''>
                       </div>
                       <!-- Room Content -->
                      <div class='room-content'><h2>";
                       $last_word_start = strrpos($subArray['name'], ':') + 1; // +1 so we don't include the space in our result
$last_word = substr($subArray['name'], $last_word_start);
 echo $last_word;
                    echo "</h2>
                       <h4>{$subArray['cost']} $ <span>/ Hour</span></h4>

                       <h6 >Capacity: <span>  {$subArray['size']} person at max</span></h6>
                       <h6 >Note: <span>  You can add services in next step</span></h6>

                       <a target='_blank' href='../checkout.php?RoomID={$subArray['id']}' class='btn view-detail-btn'>BOOK NOW <i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
                       </div>
                       </div> ";
                   

                 $counter++;  
        }
}

elseif(!isset($Taken)) {
  $resultALL  = mysqli_query($conn,$queryAll);
    while ($rowALL=mysqli_fetch_assoc($resultALL)){

        echo " <div class='border  pl-0 col single-room-area d-flex align-items-center mb-50 wow fadeInUp' data-wow-delay='200ms'>
                       <!-- Room Thumbnail -->
                       <div class='room-thumbnail'>
                       <img style='width: 100% ;height: 200px' src='$path{$rowALL['image']}' alt=''>
                       </div>
                       <!-- Room Content -->
                       <div class='room-content'><h2>";
                       $last_word_start = strrpos($rowALL['name'], ':') + 1; // +1 so we don't include the space in our result
$last_word = substr($rowALL['name'], $last_word_start);
 echo $last_word;
                    echo "</h2>
                       <h4>{$rowALL['cost']} $ <span>/ Hour</span></h4>

                       <h6 >Capacity: <span>  {$rowALL['size']} person at max</span></h6>
                       <h6 >*<span>  You can add services in next step</span></h6>

                       <a target='_blank' href='../checkout.php?RoomID={$rowALL['id']}' class='btn view-detail-btn'>BOOK NOW <i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
                       </div>
                       </div> ";
                         $counter++; 
    
}





}

// $AlltR = array_values($AlltR);

if ($counter==1&&$isROom==1) {
  echo "<div class='alert alert-dark' role='alert'>
SOORY THERE IS NO AVAILABLE  ROOMS AT CHOSEN TIME</div>";
;}

if ($counter==1&&$isROom==0) {
  echo "<div class='alert alert-dark' role='alert'>
SOORY THERE NO AVAILABLE  TABLES AT CHOSEN TIME</div>"
;}

?>


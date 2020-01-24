<?php 
    include("../../includes/connection.php");

session_start();


if(!isset($_SESSION['customer_id'])){

header("location:../../Login_v9/login.php?id={$_GET['RoomID']}");

exit();
}
if(!isset($_SESSION['details'])){

header("location:../");

exit();
}
 $query="SELECT * FROM rooms_and_tables WHERE id ={$_GET['RoomID']}";
 $result = mysqli_query($conn,$query);
 $row=mysqli_fetch_assoc($result);
 $Start_time   =$_SESSION['details']['Start_time'];
 $EndTime      =$_SESSION['details']['EndTime'];
 $BookOnDate   =$_SESSION['details']['BookOnDate'];
 $customer_id  =$_SESSION['customer_id'];
 $RTname       =$row['name'];
 $comID        =$row['company_id'];
 $RoomSize     =$row['size'];
 $isRoom       =$row['is_Room'];
 $TotalAmount  =$row['cost']*$_SESSION['details']['duration'];;
 $rtID         =$_GET['RoomID'];
 

if (isset($_POST['submit'])) {

if(!isset($_SESSION['customer_id'])){

header("location:../../Login_v9/login.php?id={$_GET['RoomID']}");

exit();
}
	

	$Note  =$_POST['notes'];
	$name  =$_POST['name'];
	$email =$_POST['email'];
	$mobile=$_POST['mobile'];
$queryTAken="SELECT Room_Table_id FROM   customers_request    WHERE Book_date='$BookOnDate' AND 
(
(Start_time 	 <= '$Start_time'  AND end_time   >  '$Start_time')
OR (Start_time   < '$EndTime'      AND end_time   >  '$EndTime') 
OR ('$Start_time'<= Start_time     AND Start_time <  '$EndTime')
OR ('$Start_time'<  end_time       AND end_time   <= '$EndTime')
)AND Room_Table_id='$rtID'";
$resultQT  = mysqli_query($conn,$queryTAken);
$rowQT=mysqli_fetch_assoc($resultQT);
if (!isset($rowQT['Room_Table_id'])) {
 
 if (isset( $_SESSION['ServiceList'])&&(count($_SESSION['ServiceList']!=0))) {
	$cost=0;
	$notes= "<br>------<br>I NEED ";
for ($i=0; $i <count($_SESSION['ServiceList']) ; $i++) { 
	$cost+=$_SESSION['ServiceList'][$i]['Cost'];
	$notes.=$_SESSION['ServiceList'][$i]['Noote']." <br> " ;
}
$TotalAmount+=$cost;
$Note .=$notes;
}




		$querya="INSERT INTO `customers_request` ( `Company_ID`, `Room_Table_id`, `Book_date`, `Start_time`, `end_time`, `customer_id`, `Total_amount`, `Notes`, `Name`, `Email`, `Mobile`,RT_Name) 
	VALUES ('$comID','$rtID', '$BookOnDate','$Start_time','$EndTime', '$customer_id','$TotalAmount', '$Note', '$name', '$email', '$mobile','$RTname')";

  mysqli_query($conn,$querya);


 $TotalAmount  =$row['cost']*$_SESSION['details']['duration'];;
 unset($_SESSION['details']);
header("Location:../../profile.php?Message=DONE");



}
else{
	if ($isRoom==1) {
header("Location:../MRooms.php?Message=1");}
	
elseif ($isRoom==2) {
	header("Location:../MTables.php?Message=1");}

}
}
	




if (isset( $_SESSION['ServiceList'])) {
	 unset( $_SESSION['ServiceList']);

}






 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	

	<!-- Custom stlylesheet -->
	 <link rel="stylesheet" href="../style.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" />
   

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	
	<div   id="booking" class="section" >
		<div class="section-center">
			<div class="container mb-0 ">
				<div class="row">
					<div class="booking-form  " >
						<div class="booking-bg " >
							<div class="form-header  ">

    <script src="../../ajax.js"></script>
    <script type="text/javascript">





		 
       
         
            function AddOrRemove(element)
 { 

 		var Serviceid =element.getAttribute("id");

 		
 		
 		var sCost =element.getAttribute("value");
 		var Notes =element.getAttribute("name");
 		var Class =Notes.split(' ')[0];
 			
		 var k=!element.checked;
		 if (k==true) {
 $('.'+Class).css('background-color','#ffff99');
		 }
		 else { $('.'+Class).css('background-color','#99ccff');
}
		 element.checked=!k;
		 Chk =element.checked;
    $.ajax(
            { 
                type: "GET",
                url: "ServicesAjax.php?SID="+Serviceid +"&checked="+Chk+"&sCost="+sCost+"&Notes="+Notes,
                success: function(data)
                {

  $("#m").html('TOTAL : '+(parseInt(data)+<?php echo "$TotalAmount";?>)+' $');
                }
            });






            }



            // -------------------
            
      
    </script>
<h3 class="mt-5 text-white">Try Our SERVICES</h3> 
								<?php
										$querys   ="SELECT * FROM services WHERE company_id =  $comID";

									$results  = mysqli_query($conn,$querys);


									$counter=1;
									while ($rows=mysqli_fetch_assoc($results)) {
										$SSC=$RoomSize*$rows['service_cost'];

										echo "<input type='Checkbox' value='$SSC' name='{$rows['service_name']}' onchange='AddOrRemove(this)' id='{$rows['service_id']}'> <label class='{$rows['service_name']}' >{$rows['service_name']} <span style='color: yellow'> &nbsp+$SSC </span></label><br>";
									}

								?>

								
								

															<p  id="m" class="col-12 text-right" > TOTAL : <?php echo "$TotalAmount";  ?> $ </p>
									</div>
						</div>
						<form class="p-3" method="post">
							<div class="row">
								<div class="col-md-12 ">
									<div class="form-group">
										<span class="form-label">Full name</span>
										<input name="name" class="form-control" type="text" required>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input name="email" class="form-control" type="text" required>
									</div>
								</div>
								
							</div><div class="row ">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Mobile</span>
										<input name="mobile" class="form-control" type="text" required>
									</div>
								</div>
								
							</div>
						
						<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Notes</span>
										<textarea name="notes" style=" max-height: 70px; padding:5px 20px" class=" form-control"></textarea>
									
									</div>
								</div>
								
							</div>
							
							
							<div class="form-btn mt-0">
								<button name="submit" type="submit" class="submit-btn">CONFIRM</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>


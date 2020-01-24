<?php 

include("includes/public_header.php");


if(!isset($_SESSION['customer_id'])){

header("location:LoginAndRegister.php?id={$_GET['RoomID']}");

exit();
}
if(!isset($_SESSION['details'])){

header("location:index.php");

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
header("Location:profile.php?Message=DONE");



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
<head>

<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

</head>

    
 


	

<style type="text/css"> body{ background-image: url(co.jpg);background-size: cover;background-position: center;		} </style>

	
	<!-- Home -->

	<div style="padding:5% 16.5% 0 16.5%  ; " class="home " >
		<!-- <div class="background_image" style=" ;background-image:url(images/Login.jpg)"></div> -->
		<div class="container pl-5 pb-5 " style=" background-color: rgb(255, 153, 51,0.4) ;margin-top: 50px ;  ">


			<div class="row ">

				<!-- Get in touch -->
				
				<!-- Contact Form -->
				<div class="col-lg-4 mr-4 p-0 ">
					<div class="contact_form_container text-center mt-5 " >

						<div class=" pt-2 mb-2 pl-3 pr-3  text-center contact_title " style=" width: 100%  ;background-color: rgb(102, 51, 0,0.6) ;color: #fff
;font-weight: bolder;">


					
OUR SERVICES
				</div>
<div class="row text-left item-center   "  >
	<div class="col-lg-12 "  >	

<?php
										$querys   ="SELECT * FROM services WHERE company_id =  $comID ORDER BY service_cost DESC";

									$results  = mysqli_query($conn,$querys);


									$counter=1;
									while ($rows=mysqli_fetch_assoc($results)) {

										$SSC=$RoomSize*$rows['service_cost'];
										if ($SSC>0) {
											echo "	<label   class='a{$rows['service_id']}{$rows['service_name']} col-12' style=' text-align: left;background-color:#ffff99;padding: 4px;color: black;font-weight: bold;
 '>
<input  value='$SSC' onchange='AddOrRemove(this)' name='{$rows['service_name']}' type='checkbox' id='{$rows['service_id']}' style=' color: white'>


 {$rows['service_name']} <span style='color: #ff8000
'>+$SSC$</span> </label>";
										}
else{



	echo "	<label   class='{$rows['service_id']}{$rows['service_name']} col-12' style=' text-align: left;background-color:#99ccff;padding: 4px;color: black;font-weight: bold;
 '>
<input  checked disabled value='$SSC' onchange='AddOrRemove(this)' name='{$rows['service_name']}' type='checkbox' id='{$rows['service_id']}' style=' color: white'>


 {$rows['service_name']} <span style='color: #ff8000
'>FREE</span> </label>";
}
									
									

											# code...
										}



								?>


							
							

							<div class="input_border ">
							

								</div>					
							<!-- <div style='border-radius: 0' class='p-1 alert alert-danger' role='alert'></div> -->


							 
  <label  class="col-12 text-center" style="color: #fff;font-size: 18px ;"  >TOTAL : <b id="m"><?php echo "$TotalAmount";  ?> $</b> </label>

							</div>

							
						</div>



						
					

							
							
					
					</div>

				</div>
		<div class=" col-lg-5 mr-4  ">
					<div class="contact_form_container text-center mt-5">
						<div class=" pt-2 mb-2 pl-3 pr-3  text-center contact_title " style=" width: 100%  ;background-color: rgb(102, 51, 0,0.6) ;color: #fff
;font-weight: bolder;">



					
CHECK OUT
				</div>

 


						<form name="form1" id="contact_form" class="contact_form" method="post">
							<div class="row text-center item-center   " >
							<div class="col-lg-12 m-1"  >
								<input required="" 
									



								  name="name" vlaue="" id="loginEmail" type="text" class="contact_input contact_input_name inpt" placeholder="Full Name" ><div class="input_border ">
								

								</div>					
							<!-- <div style='border-radius: 0' class='p-1 alert alert-danger' role='alert'></div> -->



							
							</div>
							<div class="col-lg-12 m-1"  >
								<input required="" name="email" type="text" class="contact_input contact_input_name inpt" placeholder="Email" ><div class="input_border"></div>
							</div>
	<div class="col-lg-12 m-1"  >
								<input  required="" name="mobile" type="text" class="contact_input contact_input_name inpt" placeholder=" Mobile" ><div class="input_border"></div>
							</div>
	<div class="col-lg-12 m-1"  >

										<textarea placeholder="Notes" name="notes" style=" max-height: 70px; padding:5px 20px" class=" form-control"></textarea>



								</div>
								<div class="col-lg-12  text-center m-1"  >
								<button style="font-size: 20px;background-color:#00004d
;color:white;border: none; " type="submit" name="submit" class="col-12 contact_input contact_input_name inpt btn  btn-primary " ><b>CONFIRM</b></button><div class="input_border"></div>
							</div>
								
							</div>




							

						</div>



						

					

							
							
						</form>
					</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Search -->


	<!-- Contact --> <script src="ajax.js"></script>
    <script type="text/javascript">





		 
       
         
            function AddOrRemove(element)
 { 

 		var Serviceid =element.getAttribute("id");

 		
 		
 		var sCost =element.getAttribute("value");
 		var Notes =element.getAttribute("name");
 		var Class ="a"+Serviceid+Notes.split(' ')[0];
 			 // alert(Class);

		 var k=!element.checked;
		 if (k==true) {
 $('.'+Class).css('background-color','#ffff99');
		 }
		 else {
		  $('.'+Class).css('background-color','#99ccff');
}
		 element.checked=!k;
		 Chk =element.checked;
    $.ajax(
            { 
                type: "GET",
                url: "ServicesAjax.php?SID="+Serviceid +"&checked="+Chk+"&sCost="+sCost+"&Notes="+Notes,
                success: function(data)
                {

  $("#m").html((parseFloat(data)+<?php echo "$TotalAmount";?>)+' $');
                }
            });






            }

</script>

	
<head>

<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

</head>
<?php  

$message="true";
$stage="start";

include("includes/public_header.php");
  

if(isset($_SESSION['customer_id'])){

             header("location:profile.php");

exit();
}


 if(isset($_POST['SignUP'])){

    $Email      =$_POST['rEmail'];
   
    $password   =$_POST['rPass'];
    $PassRetype =$_POST['rPass2'];
    $Name       =$_POST['rUserName'];
    $Mobile     =$_POST['rMobile'];


    echo "
        <script type='text/javascript'>$( document ).ready(function() {
   document.getElementById('rEmail').value='$Email' ;
   document.getElementById('rUserName').value='$Name' ;
   document.getElementById('rMobile').value='$Mobile' ;
   document.getElementById('rMobile').value='$Mobile' ;
   document.getElementById('rPass').value='$password' ;
   document.getElementById('rPass2').value='$PassRetype' ;


});
</script>";

while (1) {
if ($Name=="") {
	$stage="NAMEC";
	$message="PLEASE ENTER YOUR NAME";
	break;
}
if ($Email=="") {
		$stage="EmailRc";

	$message="PLEASE ENTER YOUR EMAIL";
	break;
}
if ($Mobile=="") {
	$stage="MobileCHK";
	$message="PLEASE ENTER YOUR MOBILE NUMBER";
	break;
}

$stage="PassCR";
if ($password=="") {
	$message="PLEASE ENTER A PASSWORD";
	break;
}
if ($PassRetype=="") {
	$stage="PassRCR";
	$message="PLEASE RETYPE YOUR PASSWORD";
	break;
}
if ($PassRetype!=$password) {
	$stage="Passmatch";
	$message="PASSWORDS DOES NOT MATCH";
	break;
}


$queryE="SELECT * FROM customer WHERE customer_email='$Email'";
    $resultE= mysqli_query($conn,$queryE);
    $rowE=mysqli_fetch_assoc($resultE);

    if ($rowE['customer_id']){
$stage="EmailUsed";
	$message="This Email used before";
	break;


    }


$query="INSERT INTO customer(customer_name,customer_email,customer_password,customer_mobile) VALUES ('$Name','$Email','$password','$Mobile')";
    mysqli_query($conn,$query);

    $query="SELECT * FROM customer WHERE customer_email='$Email'";
    $result= mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

        $_SESSION['customer_id']= $row['customer_id'];



       if (!isset($_GET['id'])) {
             header("location:profile.php");
             exit();
         }
     elseif (isset($_GET['id'])) {
              header("location:CheckOut.php?RoomID={$_GET['id']}");
              exit();
        }
exit();

 break;




}




    
   

}



if(isset($_POST['Signin'])){


    $CuEmail         =$_POST['loginEmail'];
    $CuPassword      =$_POST['LoginPass'];

    echo "
        <script type='text/javascript'>
$( document ).ready(function() {
   document.getElementById('loginEmail').value='$CuEmail' 
});
</script>";


while (1) {

if ($CuEmail=="") {
	$stage="EmailC";
	$message="PLEASE ENTER YOUR EMAIL";
	break;
}
if ($CuPassword=="") {
	$stage="PassC";
	$message="PLEASE ENTER YOUR PASSWORD";
	break;
}

$message="true";

 break;}




    $query="SELECT * FROM customer WHERE customer_email='$CuEmail'";
    $result= mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

    if ($row['customer_id']){
        if ($row['customer_password']=="$CuPassword"){
            

       // header("location:Manage_products.php");
            $_SESSION['customer_id']= $row['customer_id'];

            if (!isset($_GET['id'])) {
             header("location:profile.php");
             exit();
         }
      
         header("location:checkout.php?RoomID={$_GET['id']}");

         exit();
     }
     else{
        $PassCheck="Wrong";
    }
}
else{$PassCheck="Wrong"; }

}

?>

    
 }


	

<style type="text/css"> body{ background-image: url(images/Login.jpg);background-size: cover;background-position: center;		} </style>

	
	<!-- Home -->

	<div style="padding:5%  16.5% 20px 16.5%  ;" class="home ">
		<!-- <div class="background_image" style=" ;background-image:url(images/Login.jpg)"></div> -->
		<div class="container">


			<div class="row">

				<!-- Get in touch -->
				
				<!-- Contact Form -->
				<div class="col-lg-12">
					<div class="contact_form_container text-center">
						<div class=" mb-2 pl-3 pr-3  text-center contact_title " style=" width: 100%  ;background-color: rgb(128, 128, 0,0.6) ;color: #ffcc66
;font-weight: bolder;">


					
LOGIN

				</div>

 


						<form name="form1" id="contact_form" class="contact_form" method="post">
							<div class="row text-center item-center   " >
							<div class="col-lg-4 m-1"  >
								<input
									



								  name="loginEmail" vlaue="" id="loginEmail" type="text" class="contact_input contact_input_name inpt" placeholder="EMAIL" ><div class="input_border ">
								

								</div>					
							<!-- <div style='border-radius: 0' class='p-1 alert alert-danger' role='alert'></div> -->

<?php
if ($stage=="EmailC") {
	echo "
<div style='border-radius: 0' class='p-1 alert alert-danger' role='alert'>
$message
</div>";
}
?>

							
							</div>
							<div class="col-lg-4 m-1"  >
								<input name="LoginPass" type="password" class="contact_input contact_input_name inpt" placeholder="PASSWORD" ><div class="input_border"></div><?php if ($stage=="PassC") {
	echo "
<div style='border-radius: 0' class='p-1 alert alert-danger' role='alert'>
$message
</div>";
}?>
							</div><div class="col-lg-3 m-1 text-center"  >
								<button style="background-color:#808000;color:black;border: none; " type="submit" name="Signin" class="col-12 contact_input contact_input_name inpt btn  btn-primary " ><b>LOGIN</b></button><div class="input_border"></div>
							</div>
								

						</div>



						<?php
if (isset($PassCheck)) {
  if ($PassCheck=='Wrong'&&$message=="true") {
         echo "    <div class='mb-4 pl-3 pr-3  text-center contact_title ' style=' width: 100%  ;background-color: rgb(255, 0, 0,0.8) ;color: #000
;font-weight: bolder;'>


					
EMAIL OR PASSWORD IS WRONG
				</div>
        ";
        } 
}


						?>

						<div class="contact_form_container mt-4">
							
				<div class=" mb-2 pl-3 pr-3  text-center contact_title " style=" width: 100%  ;background-color: rgb(255, 204, 102,0.8) ;color: #808000
;font-weight: bolder;">

						<form name="form2" id="contact_form" class="contact_form" method="post">



					
CREAT NEW ACCOUNT

				</div>


							<div class="row  text-center item-center   " >
							<div class="col-lg-4 m-1"  >
								<input name="rUserName" id="rUserName" type="text" class="contact_input contact_input_name inpt" placeholder="NAME" ><div class="input_border"></div>
											<?php

if ($stage=="NAMEC") {
	echo "
<div style='border-radius: 0' class='p-1 mb-0 alert alert-danger' role='alert'>
$message
</div>";
}

								?>		
							
							</div>
							


								

						</div>

<div class="row text-center item-center    " >
							<div class="col-lg-4 m-1"  >
								<input name="rEmail" id="rEmail" type="text" class="contact_input contact_input_name inpt" placeholder="EMAIL" ><div class="input_border"></div>	
<?php

if ($stage=="EmailRc"||$stage=="EmailUsed") {
	echo "
<div style='border-radius: 0' class='p-1 mb-0 alert alert-danger' role='alert'>
$message
</div>";
}

								?>		
							


							
							</div>
							<div class="col-lg-4 m-1"  >
								<input name="rMobile" id="rMobile" type="text"  class="contact_input contact_input_name inpt " placeholder=" MOBILE" ><div class="input_border"></div>
									<?php

if ($stage=="MobileCHK") {
	echo "
<div style='border-radius: 0' class='p-1 mb-0 alert alert-danger' role='alert'>
$message
</div>";
}

								?>								

							</div>
						
						</div>
						<div class="row text-center item-center    " >
							<div class="col-lg-4 m-1"  >
								<input name="rPass" id="rPass" type="password" class="contact_input contact_input_name inpt" placeholder="PASSWORD" ><div class="input_border"></div>					
								<?php

if ($stage=="PassCR") {
	echo "
<div style='border-radius: 0' class='p-1 mb-0 alert alert-danger' role='alert'>
$message
</div>";
}

								?>	
							</div>
							<div class="col-lg-4 m-1"  >
								<input name="rPass2" id="rPass2" type="password" class="contact_input contact_input_name inpt mb-2" placeholder="REPEAT PASSWORD" ><div class="input_border"></div>
									<?php

if ($stage=="PassRCR") {
	echo "
<div style='border-radius: 0' class='p-1 mb-0 alert alert-danger' role='alert'>
$message
</div>";
}?>

							</div>
							<div class="col-lg-3 m-1 text-center"  >
								<button style="background-color:#ffcc66;color:black;border: none; " type="submit" name="SignUP" class="col-12 contact_input contact_input_name inpt btn  btn-primary " ><b>SING UP</b></button><div class="input_border"></div>

<?php

if ($stage=="Passmatch") {
	echo "
<div style='border-radius: 0' class='p-1 mb-0 alert alert-danger' role='alert'>
$message
</div>";
}?>

							</div>
								

						</div>
						</div>		


							
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->


	<!-- Contact -->

	
<head>
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

</head>
<?php  


include("includes/public_header.php");
 
 if (isset($_POST['send'])) {
 	$name=$_POST['Name'];
 	$email=$_POST['email'];
 	$Mobile=$_POST['Mobile'];
 	$Subject=$_POST['Subject'];
 	$Message=$_POST['Message'];

$query="INSERT INTO  contactus (Name,Email,Mobile,Message_Body,M_Subject,company_id) VALUES ('$name','$email','$Mobile','$Message','$Subject','0')";

    mysqli_query($conn,$query);
    header("location:contact.php?M=M");

    
 }


 ?>


	
	<!-- Home -->

	<div style="padding:100px  16.5% 0 16.5% ;height:800px" class="home ">
		<div class="background_image" style=" height: 100%;background-image:url(images/contact.jpg)"></div>
		<div class="container">


			<div class="row">

				<!-- Get in touch -->
				
				<!-- Contact Form -->
				<div class="col-lg-12">
					<div class="contact_form_container"><div class=" mb-4 col-12 text-center contact_title text-white">
<?php  if (isset($_GET['M'])){
echo "Message Sent";}

else
	echo "Get in touch with us
";

?>


					


				</div>




						<form action="#" id="contact_form" class="contact_form" method="post">
							<div class="row" >
							<div class="col-lg-6"  style="margin-bottom: 18px">
								<input name="Name" type="text" class="contact_input contact_input_name inpt" placeholder="Your Name" required="required"><div class="input_border"></div>
							</div><div class="col-lg-6"  style="margin-bottom: 18px">
								<input name="Mobile" type="text" class="contact_input contact_input_name inpt" placeholder="Your Mobile" required="required"><div class="input_border"></div>
							</div></div>
							<div class="row">
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input  name="email" type="text" class="contact_input contact_input_email inpt" placeholder="Your E-mail" required="required"><div class="input_border"></div></div>
								</div>
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input name="Subject" type="text" class="contact_input contact_input_subject inpt" placeholder="Subject" required="required"><div class="input_border"></div></div>
								</div>
							</div>
							<div><textarea name="Message" class="contact_textarea contact_input inpt" placeholder="Message" required="required"></textarea><div class="input_border" style="bottom:3px"></div></div>
							<button type="submit" name="send" class="contact_button" style="background-color: brown">send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->


	<!-- Contact -->

	
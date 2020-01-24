<?php include("../includes/RobertoHeader.php");







 if (isset($_POST['send'])) {
    $name=$_POST['message-name'];
    $email=$_POST['message-email'];
    $Mobile=$_POST['message-mobile'];
    $Subject=$_POST['message-subject'];
    $Message=$_POST['messageB'];

$query="INSERT INTO  contactus (Name,Email,Mobile,Message_Body,M_Subject,company_id) VALUES ('$name','$email','$Mobile','$Message','$Subject','$ComID')";

    mysqli_query($conn,$query);
    header("location:contact.php?M=M");

    
 }



?>


    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area contact-breadcrumb bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/18.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center mt-100">
                        <h2 class="page-title">Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Google Maps & Contact Info Area Start -->
    <section class="google-maps-contact-info">
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-4">
                        <div class=" col-12 single-contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Phone</h4>
                            <p><?php echo "{$row['Company_phone']}"; ?></p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-4">
                        <div class=" col single-contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Address</h4>
                         <p><?php echo "{$row['Com_Country']}-{$row['Com_CITY']} " ;?></p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>Open time</h4>
                            
                            <p><?php echo (substr($row['com_opening_time'],0,-3))." to ".(substr($row['com_closing_time'],0,-3))?> </p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    
                </div>

                <!-- Google Maps -->
                <div class="google-maps">
                    <iframe src="<?php echo "{$row['com_location']}"?>" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Maps & Contact Info Area End -->

    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <?php  if (isset($_GET['M'])){
echo " <h6>Message Sent</h6>";}

else
    echo "Contact US
";

?>

                       
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input n type="text" name="message-name" class="form-control mb-30" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="email" name="message-email" class="form-control mb-30" placeholder="Your Email">
                                </div>
                                 <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="message-mobile" class="form-control mb-30" placeholder="Your Mobile">
                                </div>
                                 <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="message-subject" class="form-control mb-30" placeholder="Subject">
                                </div>
                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="messageB" class="form-control mb-30" placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit" name="send" class="btn roberto-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->

    <!-- Call To Action Area Start -->
   
    <!-- Partner Area End -->
    <!-- Footer Area Start -->
   <?php include("../includes/Robertofooter.php");?>

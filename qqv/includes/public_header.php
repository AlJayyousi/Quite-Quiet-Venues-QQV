<?php 
ob_start();
session_start();

include("connection.php");
$path="admin/NAdmin/Admins/upload/";
if(isset($_SESSION['customer_id'])){

    $queryL   ="SELECT *
    FROM customer
    WHERE customer_id = {$_SESSION['customer_id']}";

    $resultL  = mysqli_query($conn,$queryL);
    $rowL=mysqli_fetch_assoc($resultL);

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
       <script src="ajax.js"></script>
<title>QQV</title>
    <link rel="icon" type="image/png" sizes="16x16" href="mm.png" style="background-color: black">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travello template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">


</head>
<body>

<div class="super_container  " style="">
    
    <!-- Header -->

    <header class="header  scrolled" >
        <div class="container ">
            <div class="row ">
                <div class="col ">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class=" header_content_inner d-flex flex-row align-items-end justify-content-start">
                            <div class="logo"><a href="index.php">QQV</a></div>
                            <nav class="main_nav">
                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                    <li <?php  if (basename($_SERVER['PHP_SELF'])=="index.php") {
                                     echo "class='active'";
                                    }else echo " "; ?> > <a href="index.php">Home</a></li>
                                    <!-- <li><a href="about.html">About us</a></li> -->
                              



                                <?php

                                 if(isset($_SESSION['customer_id'])&&(basename($_SERVER['PHP_SELF'])=="profile.php")){

                                    echo(" <li class='active' ><a 
                                 href='profile.php''>My Reservations</a></li>");

                                } 
                                elseif (isset($_SESSION['customer_id'])) {
                                 echo(" <li  ><a 
                                 href='profile.php''>My Reservations</a></li>");
                                }
                                 ?>   <li
<?php  if (basename($_SERVER['PHP_SELF'])=="contact.php") {
                                     echo "class='active'";
                                    }else echo " "; ?> 


                                    ><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                         <div class="header_phone ml-auto "><?php   if(isset($_SESSION['customer_id'])){

echo " <a class=' pr-0  text-white' href='profile.php'> {$rowL['customer_name']}</a>";

                       } else{echo "<a  ";

 if (basename($_SERVER['PHP_SELF'])!='LoginAndRegister.php') {
                                     echo " class=' text-white' ";
                                    }else echo " ";    



                        echo "  




                        ' href='LoginAndRegister.php'> LOGIN /  REGISTER</a>"; }?> </div>

                            <!-- Hamburger -->

                            <div class="hamburger ml-auto">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_social d-flex flex-row align-items-center justify-content-start">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </header>

    <!-- Menu -->

    <div class="menu">
        <div class="menu_header d-flex flex-row align-items-center justify-content-start">
            <div class="menu_logo"><a href="index.php">QQV</a></div>
            <div class="menu_close_container ml-auto"><div class="menu_close"><div></div><div></div></div></div>
        </div>
        <div class="menu_content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php

                                 if(isset($_SESSION['customer_id'])&&(basename($_SERVER['PHP_SELF'])=="profile.php")){

                                    echo(" <li class='active' ><a 
                                 href='profile.php''>My Reservations</a></li>");

                                } 
                                elseif (isset($_SESSION['customer_id'])) {
                                 echo(" <li  ><a 
                                 href='profile.php''>My Reservations</a></li>");
                                }
                                 ?>   

                <!-- <li><a href="about.html">About us</a></li> -->
                <li><a href="contact.php">Contact</a></li>
                <?php   if(isset($_SESSION['customer_id'])){

echo " <a class=' ' href='profile.php'> {$rowL['customer_name']}</a>";

                       } else echo " <a  href='LoginAndRegister.php'> LOGIN / REGISTER</a>"; ?> </div>
            </ul>
        </div>
        <div  class="menu_social">
            <div class="menu_phone ml-auto">Call us: 00-56 445 678 33</div>
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
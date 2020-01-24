<?php

ob_start();
session_start();
if(!isset($_COOKIE['ComId'])){header("location:../");
}
$ComID=$_COOKIE['ComId'];

include("connection.php");
$path="../admin/NAdmin/Admins/upload/";
$query="SELECT * FROM companies WHERE com_id= {$_COOKIE['ComId']}";
$result = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);




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

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>QQV-R</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="mm.png" >

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body style="padding-top: 110px;">
    <!-- Preloader -->
   <!--  <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area "  style="position: fixed ;  
    top:  0;
    right: 0;
    ">
    <!-- Search Form -->


    <!-- Top Header Area Start -->
    <div class="top-header-area " style="z-index: 100" >
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="top-header-content">
                      <a href="../">   <b>BACK TO QQV</b></a>
                  </div>
              </div>

              <div class="col-6">
                <div class="top-header-content">
                    <!-- Top Social Area -->
                    <div class="  top-social-area ml-auto">


                       <?php   if(isset($_SESSION['customer_id'])){
 echo "<a class='mr-1' href='../profile.php'> <span>  <b> {$rowL['customer_name']}</b></span></a> ";


                       } else echo "<a href='../LoginAndRegister.php'> <span>  <b>LOGIN /  REGISTER</b></span></a>"; ?>
                   </div>
               </div>
           </div>

       </div>
   </div>
</div>
<!-- Top Header Area End -->

<!-- Main Header Start -->
<div class="main-header-area " style="z-index:-1">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Classy Menu -->
            <nav class="classy-navbar  justify-content-between" id="robertoNav">

                <!-- Logo -->
<div class="row">
                <a  style="line-height: 80px "  class="nav-brand mr-3" 

                href="index.php"> <?php echo "{$row['Com_name']}</a> "?>

   <label style=" line-height: 80px; color: blue;font-size: 20px" >: <?php echo (substr($row['com_opening_time'],0,-3))." to ".(substr($row['com_closing_time'],0,-3))?></label>




          
          
             </div>  
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu " >
                <!-- Menu Close Button -->
                <div class="classycloseIcon ">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav  " >
                    <ul id="nav   "  >

                        <li><a href="index.php"> Home</a></li>
                        <li><a href="MRooms.PHP">Meeting Rooms</a></li>
                        <li><a href="MTables.PHP">Tables</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>

                    <!-- Search -->


                    <!-- Book Now -->

                </div>
                <!-- Nav End -->
            </div>
        </nav>
    </div>
</div>
</div>
</header>
<!-- Header Area End -->

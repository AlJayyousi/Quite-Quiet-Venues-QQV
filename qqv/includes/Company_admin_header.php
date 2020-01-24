<?php
 ob_start();

include("connection.php");
session_start();

if(!isset($_SESSION['Cadmin_id'])){
 

header("location:login/CAlogin.php");

exit();
}
$company_id     =$_SESSION['Company_ID'];

$query   ="SELECT *
                 FROM com_admins
                 INNER JOIN companies
                 ON com_admins.Company_ID = companies.Com_id WHERE Company_ID ={$_SESSION['Company_ID']}";

 $result  = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result)

?>




<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="mm.png" style="background-color: black">
    <title>QQV</title>
    <!-- Custom CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>




<body >
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   <!--  <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar "   data-navbarbg="skin6">
            <nav style="position: fixed; " class="col-12 topbar navbar top-navbar navbar-expand-md navbar-light ">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class=" pl-4 pr-4 navbar-brand">
                        <a href="index.php" class="logo">
                            <!-- Logo icon -->
                            <b class="  logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <!-- <img src="mm.png" alt="homepage" class="dark-logo" /> -->
                                <!-- Light Logo icon -->
                                <img style="width: 100%;height: 50px;" src="mm.png" alt="homepage" class=" light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                           
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div  class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                   
<li class=" p-1 ">

                      
                        <a  href="viewCompanyDetails.php" class="pro-pic"  aria-haspopup="true" aria-expanded="false"><img style="width: 50px"  src="../upload/<?php echo "{$row['Com_logo']}"; ?>" alt="user" class="rounded-circle" width="31">
                          <label style="font-size: 20px"><?php echo "{$row['Com_name']}";    ?></label></a>

                    

                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul  class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class=" p-1 ">

                        <label style="font-size: 20px"><?php echo "{$row['Com_Admin_Name']}"; ?></label>
                        <a  class="pro-pic"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="width: 50px"  src="../upload/<?php echo "{$row['Com_Admin_Image']}"; ?>" alt="user" class="rounded-circle" width="31"></a>

                    </li>

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside style="position: fixed;" class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                            <i class="mdi mdi-home"></i>
                            <span class="hide-menu">Home</span>
                        </a>
                    </li>
 <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="crequest.php" aria-expanded="false">
                                <i class="mdi mdi-calendar-multiple"></i>
                                <span class="hide-menu">Client Reservations </span>
                            </a>
                    </li>
                    
                   
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ViewRooms.php" aria-expanded="false">
                            <i class="mdi mdi-chair-school"></i>
                            <span class="hide-menu">View Rooms </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ViewTables.php" aria-expanded="false">
                                <i class="mdi mdi-chair-school"></i>
                                <span class="hide-menu">View Tables </span>
                            </a>
                    </li>
                     <li class='sidebar-item'>
                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='manage_RoomsAndTables.php' aria-expanded='false'>
                            <i class='mdi mdi-page-layout-sidebar-left'></i>
                            <span class='hide-menu'>Manage  Rooms and Tables</span>
                        </a>
                    </li> 
                  
                    <li class='sidebar-item'>
                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='manage_services.php' aria-expanded='false'>
                            <i class='mdi mdi-format-list-bulleted  '></i>
                            <span class='hide-menu'>Manage Services</span>
                        </a>
                    </li>
                     <?php if( $row['Com_Admin_master']==1){
                   echo "

                    
                     <li class='sidebar-item'>
                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='Manage_company_admin.php' aria-expanded='false'>
                            <i class='mdi mdi-account'></i>
                            <span class='hide-menu'>Manage  admins</span>
                        </a>
                    </li>

                    ";}?>
                    
                   
              <li class="  sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="login/logout.php" aria-expanded="false">
                            <i class="mdi mdi-logout"></i>
                            <span class="hide-menu"><b>LOG OUT</b></span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
        <!-- ============================================================== -->
<?php
ob_start();
include("connection.php");

session_start();

if(!isset($_SESSION['admin_id'])){
header("location:login/WAlogin.php");
exit();
}


$query   ="SELECT *
                 FROM web_admin
                 WHERE web_admin_id = {$_SESSION['admin_id']}";

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
    <link rel="icon" type="image/png" sizes="16x16" href="mm.png" >
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
            <nav style="position: fixed;" class="col-12 topbar navbar top-navbar navbar-expand-md navbar-light">
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
                    <li class="nav-item search-box">


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

                        <label style="font-size: 20px"><?php echo "{$row['web_admin_name']}"; ?></label>
                        <a  class="pro-pic"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="width: 50px"  src="<?php echo "upload/{$row['web_admin_image']}"?>" alt="user" class="rounded-circle" width="31"></a>

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
                            <span class="hide-menu">HOME</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view_companies.php" aria-expanded="false">
                            <i class="mdi mdi-television-guide"></i>
                            <span class="hide-menu">View Companies</span>
                        </a>
                    </li>
                    <li class='sidebar-item'>
                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='Add_company.php' aria-expanded='false'>
                            <i class='mdi mdi-plus-circle'></i>
                            <span class='hide-menu'>Add New Company</span>
                        </a>
                    </li>
                    <?php if( $row['admin_master']==1){
                   echo "
                     
                    <li class='sidebar-item'>
                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='Manage_web_admin.php' aria-expanded='false'>
                            <i class='mdi mdi-account'></i>
                            <span class='hide-menu'>Manage  admin</span>
                        </a>
                    </li>";
                }

                
                    ?>
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
<?php 
include("../../../../../includes/connection.php");
session_start();
if(isset($_SESSION['Cadmin_id'])){
header("location:../index.php");
exit();
}
if(isset($_POST['submit'])){
  $EmailCheck="Found";
  $PassCheck="true";

  $adminEmail        =$_POST['email'];
  $adminPassword     =$_POST['password'];
  $query="SELECT * FROM com_admins WHERE Com_Admin_Email='$adminEmail'";

  $result         = mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($result);

if ($row['Com_Admin_ID']){
if ($row['Com_Admin_password']=="$adminPassword"){
     
       $_SESSION['Cadmin_id']  = $row['Com_Admin_ID'];
       $_SESSION['Company_ID'] = $row['Company_ID'];
       header("location:../index.php");
   }
  else{
   $PassCheck="Wrong";
   }
}
else{$PassCheck="Wrong"; }

}

 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V14</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <?php   
if (isset($PassCheck)) {
  if ($PassCheck=='Wrong') {
         echo "    <div class=' mt-3 alert alert-warning text-center' role='alert'>
  EMAIL OR PASSWORD IS WRONG
</div>
        ";
        } 
}
          ?>
        <form class="login100-form validate-form flex-sb flex-w" method="post">
          <span class="login100-form-title p-b-32">
            ADMIN LOGIN
          </span>

          <span class="txt1 p-b-11">
            Email
          </span>
          <div class="wrap-input100  m-b-36" >
            <input required="" class="input100" type="text" name="email" >
            <span class="focus-input100"></span>
          </div>
          
          <span class="txt1 p-b-11">
            Password
          </span>
          <div class="wrap-input100  m-b-12"  >
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input class="input100" required="" type="password" name="password" >
            <span class="focus-input100"></span>
          </div>
          
         

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="submit" >
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>
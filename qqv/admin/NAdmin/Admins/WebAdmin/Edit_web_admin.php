<?php


include("../../../../includes/admin_header.php");
if( $row['admin_master']!=1){
    header("location:index.php");

}

$path          ="upload/";
 $imageNAme=$_GET['imageName'];
if (isset($_POST['submit'])) {
    $adminFullName   =$_POST['W_A_F_name'];
    $adminEmail      =$_POST['W_A_email'];
    $adminMobile     =$_POST['W_A_mobile'];
    $adminPassword   =$_POST['W_A_Password'];
    $adminType       =$_POST['admin_type'];

    $AdminImage      =$_FILES['admin_photo']['name'];
    $tmp_name        =$_FILES['admin_photo']['tmp_name'];

    
    move_uploaded_file($tmp_name,$path.$AdminImage);

    

    if ($_FILES['admin_photo']['error']==0) {
     
         if ($imageNAme!=$path) {
       unlink($imageNAme);
      }
      
  $query="UPDATE web_admin SET web_admin_name     ='$adminFullName', 
                               web_admin_email    ='$adminEmail',
                               web_admin_mobile   ='$adminMobile',
                               web_admin_password ='$adminPassword',
                               web_admin_image    ='$AdminImage',
                               admin_master       ='$adminType'
  WHERE web_admin_id = {$_GET['WEBadminID']}";
   }
   else{
    $query="UPDATE web_admin SET web_admin_name     ='$adminFullName', 
                                 web_admin_email    ='$adminEmail',
                                 web_admin_mobile   ='$adminMobile',
                                 web_admin_password ='$adminPassword',
                                 admin_master       ='$adminType'
  WHERE web_admin_id = {$_GET['WEBadminID']}";
}


  mysqli_query($conn,$query);
  
  header("location:Manage_web_admin.php");

}





// header("location:Manage_Products.php");


$query   = "SELECT * FROM web_admin WHERE web_admin_id ={$_GET['WEBadminID']}";
$result  = mysqli_query($conn,$query);
$row     = mysqli_fetch_assoc($result);?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        <h4 class="card-title">Edit ADMIN</h4>
                        <form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
                            <div class="row" >
                                <div class="col-6 form-group">
                                    <label>FULL NAME</label>
                                    <input value='<?php echo $row['web_admin_name'];  ?>' type="text" class="form-control" required="" name="W_A_F_name" >
                                </div>
                                <div class=" col-6 form-group">
                                <label for="example-email">Email</label>
                                <input value='<?php echo $row['web_admin_email'];  ?>' type="email" id="example-email" name="W_A_email" class="form-control" maxlength="50">
                            </div>

                            </div>

<div class="row" >
                            <div class="  col-6 form-group">
                                <label>Password</label>
                                <input value='<?php echo $row['web_admin_password'];  ?>' required="" type="password" class="form-control" minlength="8" maxlength="16" name="W_A_Password" > 

                            </div>
                             <div class=" col-6 form-group">
                                <label for="example-email">Mobile</label>
                                <input value='<?php echo $row['web_admin_mobile'];  ?>' type="text" id="example-mobile" name="W_A_mobile" class="form-control" maxlength="50">
                            </div>
                           
                        </div>
                            <div class="row">


                            
                           
                            <div class=" col-6 form-group">
                            <label>PHOTO</label>
                            <input name="admin_photo"  type="file" class="form-control">
                        </div>

 <div class="form-group col-6  ">

                                <label>Admin Type</label>

                                <div class="col-sm-4">
                                    <div class="custom-control custom-radio">
                                             <?php
 if ($row['admin_master']==1 ) {
                                       echo "<input checked  value='1' required='' type='radio' id='customRadio1' name='admin_type' class='custom-control-input'>
                                        <label class='custom-control-label' v for='customRadio1'>Master Admin</label>
                                    </div>
                                    <div class='custom-control custom-radio'>
                                        <input  value='0' type='radio' id='customRadio2' name='admin_type' class='custom-control-input'>
                                        <label  class='custom-control-label' for='customRadio2'>Normal Admin</label>";
                                       }
                                       else {   echo "<input  value='1' required='' type='radio' id='customRadio1' name='admin_type' class='custom-control-input'>
                                        <label class='custom-control-label' v for='customRadio1'>Master Admin</label>
                                    </div>
                                    <div class='custom-control custom-radio'>
                                        <input checked  value='0' type='radio' id='customRadio2' name='admin_type' class='custom-control-input'>
                                        <label  class='custom-control-label' for='customRadio2'>Normal Admin</label>";}
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                     
                        

 <div class="form-group col-12 text-right  ">

                        <button type="submit " name="submit" class=" mt-2 col-1 btn btn-success" name="ADD"  > UPDATE </button>

                    </div>

                    </div>
                   
                </form>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->

</div>

<?php
include("../../../../includes/admin_footer.php");

?>
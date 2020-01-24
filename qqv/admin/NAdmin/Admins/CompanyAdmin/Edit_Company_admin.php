<?php
include("../../../../includes/Company_admin_header.php");
$querys   = "SELECT * FROM com_admins WHERE Com_Admin_ID ={$_GET['adminID']}";
$results  = mysqli_query($conn,$querys);
$row     = mysqli_fetch_assoc($results);
if ($row['Company_ID']!=$company_id||$row['Com_Admin_master']!=1) {
header("location:index.php");
}
 

$path          ="upload/";
 $imageNAme=$_GET['imageName'];
if (isset($_POST['submit'])) {
    $adminFullName   =$_POST['C_A_F_name'];
    $adminEmail      =$_POST['C_A_email'];
    $adminMobile     =$_POST['C_A_mobile'];
    $adminPassword   =$_POST['C_A_Password'];
    $adminType       =$_POST['admin_type'];

    $AdminImage      =$_FILES['admin_photo']['name'];
    $tmp_name        =$_FILES['admin_photo']['tmp_name'];

    
    move_uploaded_file($tmp_name,$path.$AdminImage);

    

    if ($_FILES['admin_photo']['error']==0) {
     
         if ($imageNAme!=$path) {
       unlink($imageNAme);
      }
      
  $query="UPDATE com_admins SET Com_Admin_Name     ='$adminFullName', 
                               Com_Admin_Email    ='$adminEmail',
                               Com_Admin_phone   ='$adminMobile',
                               Com_Admin_password ='$adminPassword',
                               Com_Admin_Image    ='$AdminImage',
                               Com_Admin_master       ='$adminType'
  WHERE Com_Admin_ID = {$_GET['adminID']}";
   }
   else{
    $query="UPDATE com_admins SET Com_Admin_Name     ='$adminFullName', 
                                 Com_Admin_Email    ='$adminEmail',
                                 Com_Admin_phone   ='$adminMobile',
                                 Com_Admin_password ='$adminPassword',
                                 Com_Admin_master       ='$adminType'
  WHERE Com_Admin_ID = {$_GET['adminID']}";
}


  mysqli_query($conn,$query);
  
  header("location:Manage_company_admin.php");

}





// header("location:Manage_Products.php");









?>
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
                                    <input value='<?php echo $row['Com_Admin_Name'];  ?>' type="text" class="form-control" required="" name="C_A_F_name" >
                                </div>
                                <div class=" col-6 form-group">
                                <label for="example-email">Email</label>
                                <input value='<?php echo $row['Com_Admin_Email'];  ?>' type="email" id="example-email" name="C_A_email" class="form-control" maxlength="50">
                            </div>

                            </div>

<div class="row" >
                            <div class="  col-6 form-group">
                                <label>Password</label>
                                <input value='<?php echo $row['Com_Admin_password'];  ?>' required="" type="password" class="form-control" minlength="8" maxlength="16" name="C_A_Password" > 

                            </div>
                             <div class=" col-6 form-group">
                                <label for="example-email">Mobile</label>
                                <input value='<?php echo $row['Com_Admin_phone'];  ?>' type="text" id="example-mobile" name="C_A_mobile" class="form-control" maxlength="50">
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
 if ($row['Com_Admin_master']==1 ) {
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
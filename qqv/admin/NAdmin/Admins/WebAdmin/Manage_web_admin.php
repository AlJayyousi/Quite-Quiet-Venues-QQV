<?php
include("../../../../includes/admin_header.php");
if( $row['admin_master']!=1){
    header("location:index.php");

}
$path          ="upload/";
if (isset($_POST['submit'])) {
    $adminFullName   =$_POST['W_A_F_name'];
    $adminEmail      =$_POST['W_A_email'];
    $adminMobile     =$_POST['W_A_mobile'];
    $adminPassword   =$_POST['W_A_Password'];
    $adminType       =$_POST['admin_type'];

    $AdminImage      =$_FILES['admin_photo']['name'];
    $tmp_name        =$_FILES['admin_photo']['tmp_name'];

    
    move_uploaded_file($tmp_name,$path.$AdminImage);

    $query="INSERT INTO  web_admin (web_admin_name,web_admin_email,web_admin_mobile,web_admin_password,web_admin_image,admin_master) VALUES ('$adminFullName','$adminEmail','$adminMobile','$adminPassword','$AdminImage','$adminType')";

    mysqli_query($conn,$query);
    header("location:manage_web_admin.php");
    

}








?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">

  <!-- ============================================================== -->
    <div class="container-fluid">
     <div class="col-12">
        <div class="card">
         <div class="card-body">
            <div class="table-responsive m-t-20">
                <table class=" text-center  table table-bordered table-striped table-hover  table-responsive-lg">
                    <thead>
                        <tr>
                            <th scope="col-6">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Admin Type</th>
                            <th scope="col">Edit</th>
                            <th style="l" scope="col">Delete</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>

                       <?php

                       $query   ="SELECT * FROM web_admin";
                       $result  = mysqli_query($conn,$query);

                       $counter=1;
                       while ($row=mysqli_fetch_assoc($result)) {
                          
                         echo "<tr>"; 
                         echo "<td>  $counter </td>";
                         echo "<td style='height:110px; background-image:url($path{$row['web_admin_image']}) ;background-repeat:no-repeat; background-position: center;background-size: cover ' > </td>";
                         
                         echo "<td> {$row['web_admin_name']} </td>";
                         echo "<td> {$row['web_admin_email']} </td>";
                         echo "<td> {$row['web_admin_mobile']} </td>";
                         if ($row['admin_master']==1 ) {
                             echo "<td> Master </td>";
                         }
                         else {   echo "<td> Normal </td>";}


                         echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn btn-success' href='Edit_web_admin.php?WEBadminID={$row['web_admin_id']}&imageName=$path{$row['web_admin_image']}' ><b> EDIT<b></a></td>";  
                         echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn btn-danger' href='web_delete_admin.php?WEBadminID={$row['web_admin_id']}&imageName=$path{$row['web_admin_image']}' ><b> DELETE<b></a></td>";
                         
                         
                         
                         $counter++;
                         echo "</tr>"; 
                        
                     }
                      if($counter==1){ echo "<td class='text-center' colspan='8' >  No Admins</td>";   echo "</tr>"; }
                     ?>
                 </tbody>
             </table>
         </div>

     </div>
 </div>
</div>

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
                        <h4 class="card-title">ADD NEW ADMIN </h4>
                        <form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
                            <div class="row" >
                                <div class="col-6 form-group">
                                    <label>FULL NAME</label>
                                    <input type="text" class="form-control" required="" name="W_A_F_name" >
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="example-email">Email</label>
                                    <input type="email" id="example-email" name="W_A_email" class="form-control" maxlength="50">
                                </div>

                            </div>

                            <div class="row" >
                                <div class="  col-6 form-group">
                                    <label>Password</label>
                                    <input  required="" type="password" class="form-control" minlength="8" maxlength="16" name="W_A_Password" > 

                                </div>
                                <div class=" col-6 form-group">
                                    <label for="example-email">Mobile</label>
                                    <input type="text" id="example-mobile" name="W_A_mobile" class="form-control" maxlength="50">
                                </div>

                            </div>
                            <div class="row">




                                <div class=" col-6 form-group">
                                    <label>PHOTO</label>
                                    <input name="admin_photo" required="" type="file" class="form-control">
                                </div>

                                <div class="form-group col-6  ">

                                    <label>Admin Type</label>

                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input   value="1" required="" type="radio" id="customRadio1" name="admin_type" class="custom-control-input">
                                            <label class="custom-control-label" v for="customRadio1">Master Admin</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input  value="0" type="radio" id="customRadio2" name="admin_type" class="custom-control-input">
                                            <label  class="custom-control-label" for="customRadio2">Normal Admin</label>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group col-12 text-right  ">

                                <button type="submit " name="submit" class=" mt-2 col-2 btn btn-success" name="ADD"  > ADD </button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>


    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
</div>
 </div>
<?php
include("../../../../includes/admin_footer.php");

?>
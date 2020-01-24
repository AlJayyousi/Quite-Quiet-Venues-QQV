<?php
include("../../../../includes/Company_admin_header.php");
   $company_id     =$_SESSION['Company_ID'];
$path          ="../upload/";
if (isset($_POST['submit'])) {
    $adminFullName   =$_POST['C_A_F_name'];
    $adminEmail      =$_POST['C_A_email'];
    $adminMobile     =$_POST['C_A_mobile'];
    $adminPassword   =$_POST['C_A_Password'];
    $adminType       =$_POST['admin_type'];

 

    $AdminImage      =$_FILES['admin_photo']['name'];
    $tmp_name        =$_FILES['admin_photo']['tmp_name'];

    
    move_uploaded_file($tmp_name,$path.$AdminImage);

    $query="INSERT INTO  com_admins (Com_Admin_Name,Com_Admin_Email,Com_Admin_phone,Com_Admin_password,Com_Admin_Image,Com_Admin_master,Company_ID) VALUES ('$adminFullName','$adminEmail','$adminMobile','$adminPassword','$AdminImage','$adminType','$company_id')";

    mysqli_query($conn,$query);
    header("location:manage_Company_admin.php");
    

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

                       $query   ="SELECT * FROM com_admins WHERE Company_ID = $company_id";
                       $result  = mysqli_query($conn,$query);

                       $counter=1;
                       while ($row=mysqli_fetch_assoc($result)) {
                         echo "<tr>"; 
                         echo "<td>  $counter </td>";
                         echo "<td style='height:110px; background-image:url($path{$row['Com_Admin_Image']}) ;background-repeat:no-repeat; background-position: center;background-size: cover ' > </td>";
                         
                         echo "<td> {$row['Com_Admin_Name']} </td>";
                         echo "<td> {$row['Com_Admin_Email']} </td>";
                         echo "<td> {$row['Com_Admin_phone']} </td>";
                         if ($row['Com_Admin_master']==1 ) {
                             echo "<td> Master </td>";
                         }
                         else {   echo "<td> Normal </td>";}

                            if ($counter==1) {
                               echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn disabled btn-success'><b> EDIT<b></a></td>";  
                         echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn disabled btn-danger' ><b> DELETE<b></a></td>";
                            }
                            else{
                         echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn  btn-success'  href='Edit_company_admin.php?adminID={$row['Com_Admin_ID']}&imageName=$path{$row['Com_Admin_Image']}' ><b> EDIT<b></a></td>";  
                         echo "<td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:122px' class='btn btn-danger' href='company_delete_admin.php?adminID={$row['Com_Admin_ID']}&imageName=$path{$row['Com_Admin_Image']}' ><b> DELETE<b></a></td>";}
                         
                         
                         
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
                                    <input type="text" class="form-control" required="" name="C_A_F_name" >
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="example-email">Email</label>
                                    <input type="email" id="example-email" name="C_A_email" class="form-control" maxlength="50">
                                </div>

                            </div>

                            <div class="row" >
                                <div class="  col-6 form-group">
                                    <label>Password</label>
                                    <input  required="" type="password" class="form-control" minlength="8" maxlength="16" name="C_A_Password" > 

                                </div>
                                <div class=" col-6 form-group">
                                    <label for="example-email">Mobile</label>
                                    <input type="text" id="example-mobile" name="C_A_mobile" class="form-control" maxlength="50">
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
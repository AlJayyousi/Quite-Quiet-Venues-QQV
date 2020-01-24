 <?php
include("../../../../includes/Company_admin_header.php");

 $path          ="../upload/";
  $company_id     =$_SESSION['Company_ID'];

 if (isset($_POST['submit'])) {
   $Owner_Name             =$_POST['com_OWNER_Fname']." ".$_POST['com_OWNER_Lname'];
   $Owner_Email            =$_POST['Owner_Email'];
   $Owner_Phone            =$_POST['Owner_Phone'];
   $Owner_Password         =$_POST['Owner_Password'];
   

    // ------------------------------------------------

   $Company_name           =$_POST['Company_name'];
   $Company_desc           =$_POST['Company_desc'];
   $Company_Location       =$_POST['Company_Location'];
   $Country                =$_POST['country'];




   $city                   =$_POST['state'];

   $OpenTime               =$_POST['OpenTime'];
   $CloseTime              =$_POST['closeTime'];

   $CompanyLogo            =$_FILES['CompanyLogo']['name'];
   $tmp_name               =$_FILES['CompanyLogo']['tmp_name'];
   move_uploaded_file($tmp_name,$path.$CompanyLogo);

if ($Country!='NO'&&$city!='NO') {
$queryC="UPDATE companies SET    Com_Country         ='$Country',
                                 Com_CITY            ='$city'
                                WHERE Com_id =  $company_id";
mysqli_query($conn,$queryC);

}
   
   if ($_FILES['CompanyLogo']['error']==0) {

       if ($imageNAme!=$path) {
         unlink($imageNAme);
     }



     $query="UPDATE companies SET Com_name            ='$Company_name', 
                                  Com_logo            ='$CompanyLogo',
                                  com_location        ='$Company_Location',
                                  com_description     ='$Company_desc',
                                  com_opening_time    ='$OpenTime',
                                  com_closing_time    ='$CloseTime'
                                  


     WHERE Com_id =  $company_id";

 }
 else{
    $query="UPDATE companies SET Com_name  ='$Company_name', 
                                 com_location        ='$Company_Location',
                                 com_description     ='$Company_desc',
                                 com_opening_time    ='$OpenTime',
                                 com_closing_time    ='$CloseTime'
                                


    WHERE Com_id =  $company_id";
}


mysqli_query($conn,$query);


$queryO="UPDATE com_admins SET Com_Admin_Name      ='$Owner_Name', 
Com_Admin_Email    ='$Owner_Email',
Com_Admin_phone    ='$Owner_Phone',
Com_Admin_password ='$Owner_Password'
  WHERE Com_Admin_ID =   {$_SESSION['Cadmin_id']}


";



mysqli_query($conn,$queryO);                    



header("location:viewcompanyDetails.php?comID={$_GET['comID']}");

}





$query= "SELECT * FROM companies INNER JOIN com_admins ON companies.Com_id = com_admins.Company_id  WHERE Com_id = $company_id ORDER BY Com_Admin_ID LIMIT 1" ;
$result  = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);







?>


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">

     <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img style="height: 150px ;width: 150px " src="<?php echo"$path{$row['Com_logo']}" ?>" class="rounded-circle" width="120"   />
                            <h4 class="card-title m-t-10"><?php echo $row['Com_name']; ?></h4>
                            <h4 class="card-title m-t-10"><?php echo $row['Company_phone']; ?></h4>
                            <h6 class="card-subtitle"><?php echo $row['com_description']; ?></h6>
                            <div class="row text-center justify-content-md-center">
                                <h6 class="card-subtitle"><?php echo  explode(" ", $row['Register_Date'])[0]; ?></h6>

                            </div>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                        <div class="card-body"> <small class="text-muted">Owner Name </small>
                            <h6><?php echo $row['Com_Admin_Name']; ?></h6>
                            <small class="text-muted p-t-30 db">Phone</small>
                            <h6><?php echo $row['Com_Admin_phone']; ?></h6> 
                            <small class="text-muted p-t-30 db">Email</small>
                            <h6><?php echo $row['Com_Admin_Email']; ?></h6> 
                            <small class="text-muted p-t-30 db">Location</small>
                            <div class="map-box">
                               <iframe src=" <?php echo $row['com_location']; ?>  " width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                           </div> 
                       </div>
                   </div>

                   <a href="View_companies.php" class="btn btn-success col-12"> BACK</a>
               </div>
               <!-- Column -->
               <!-- Column -->
               <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                       <form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
                        <h4 class="card-title">OWNER INFORMATION</h4>
                        <hr>
                        <div class="row" >

                            <div class="col-6 form-group">
                                <label>OWNER FIRST NAME</label>
                                <input type="text" value="<?php echo  explode(" ", $row['Com_Admin_Name'])[0]; ?>" class="form-control" name="com_OWNER_Fname" >
                            </div>

                            <div class="col-6 form-group">
                                <label>OWNER LAST NAME</label>
                                <input type="text" value="<?php echo  explode(" ", $row['Com_Admin_Name'])[1]; ?>" class="form-control"  name="com_OWNER_Lname" >
                            </div>

                        </div>
                        <div class="row" >

                            <div class="col-6 form-group">
                                <label>OWNER PHONE</label>
                                <input type="text"  value="<?php echo $row['Com_Admin_phone']; ?>" class="form-control" name="Owner_Phone" >
                            </div>
                            <div class="col-6 form-group">
                                <label>OWNER EMAIL</label>
                                <input type="text" value="<?php echo $row['Com_Admin_Email']; ?>"  class="form-control" name="Owner_Email" >
                            </div>


                        </div>
                        <div class="row" >



                            <div class="col-6 form-group">
                                <label>OWNER PASSWORD</label>
                                <input type="PASSWORD" class="form-control" value="<?php echo $row['Com_Admin_password']; ?>" name="Owner_Password" >
                            </div>
                            

                        </div>
                        <hr>
                        <h4 class="card-title">COMPANY INFORMATION </h4>
                        <hr>
                        <div class="row" >

                            <div class="col-6 form-group">
                                <label>COMPANY NAME</label>
                                <input type="text" value="<?php echo $row['Com_name']; ?>" class="form-control" name="Company_name" >
                            </div>

                            <div class=" col-6 form-group">
                                <label>COMPANY LOGO</label>
                                <input name="CompanyLogo"  type="file" class="form-control">
                            </div>

                        </div>

                        <div class="row" >
                            <div class="  col-12 form-group" >
                                <label>COMPANY DESCRIPTION</label>
                                <input  value="<?php echo $row['com_description']; ?>"  type="text" class="form-control"  name="Company_desc" > 

                            </div>
                        </div>
                        <hr>
                        <b>Company Location : <?php echo $row['Com_Country']."-".$row['Com_CITY']; ?> </b>
                        <hr>

                        <div class="row">
                         <select required="" name="country"   class="col-3 mr-2 custom-select  countries order-alpha " id="countryId" style="h" 

                         >
                         <option selected=""  value="NO"> <?php echo $row['Com_Country']; ?> </option>
                     </select>
                     <select   name="state" class=" col-3 mr-2 custom-select states order-alpha selectpicker " id="stateId" >
                        <option  value="NO">Select State</option>
                     </select>

                    <div class=" col-4 form-group">
                        <input type="text" value="<?php echo $row['com_location']; ?>" id="example-mobile" name="Company_Location" class="form-control" maxlength="1000">
                    </div>

                </div>
                <hr>
                        <b>Company Open Time  </b>
                        <hr>

                        <div class="row">
   <div class=" row col-sm-8 ">

                                         <label>OPEN ON &nbsp;&nbsp;</label>
                                        <div class>
                                            <input value="<?php echo $row['com_opening_time']; ?>" type="time"  class=" mr-5 time-4"  name="OpenTime">
                                        </div>
                                       

                                        <label>CLOSE ON &nbsp;&nbsp;</label>
                                        <div class>
                                           <input value="<?php echo $row['com_closing_time']; ?>" type="time"  class=" mr-5 time-4"  name="closeTime">                                        </div>


                                        
                                        
                                    </div>

                        </div>





                <div class="form-group col-12 text-right  ">

                    <button type="submit " name="submit" class=" mt-2 col-2 btn btn-success"   > UPDATE </button>

                </div>

            </div>

        </form>
    </div>
</div>
</div>
<!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>

<?php
include("../../../../includes/admin_footer.php");

?>
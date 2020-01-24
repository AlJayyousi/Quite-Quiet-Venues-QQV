<?php

include("../../../../includes/admin_header.php");

$path          ="../upload/";


// $WEEKDAY =array('FRI','SUN','MON','TUE','WED','THU','SAT') ;
//  for ($i=0; $i <=6 ; $i++) { 
//      if (isset($_POST[$WEEKDAY[$i]])) {
//        $OpenDaySs.='Z'.$WEEKDAY[$i];
     
    

   




 //     }
 // }

if (isset($_POST['submit'])) {

    

    $Owner_Name             =$_POST['com_OWNER_Fname']." ".$_POST['com_OWNER_Lname'];
    $Owner_Email            =$_POST['Owner_Email'];
    $Owner_Phone            =$_POST['Owner_Phone'];
    $Owner_Password         =$_POST['Owner_Password'];
    $OwnerImage             =$_FILES['OwnerImage']['name'];
    $tmp_name               =$_FILES['OwnerImage']['tmp_name'];
    move_uploaded_file($tmp_name,$path.$OwnerImage);

    // ------------------------------------------------

    $Company_name           =$_POST['Company_name'];
    $Company_desc           =$_POST['Company_desc'];
    $Company_Location       =$_POST['Company_Location'];
    $Country                =$_POST['country'];
    $city                   =$_POST['state'];

    $Company_Phone          =$_POST['Companphone'];


    $OpenTime               =$_POST['OpenTime'];
    $CloseTime              =$_POST['CloseTime'];

    $CompanyLogo            =$_FILES['CompanyLogo']['name'];
    $tmp_name            =$_FILES['CompanyLogo']['tmp_name'];
    move_uploaded_file($tmp_name,$path.$CompanyLogo);

    
    // header("location:manage_web_admin.php");
   


 $query="INSERT INTO  companies(Com_name,Com_logo,com_location,com_description,com_opening_time,com_closing_time,Company_phone,Com_Country,Com_CITY) VALUES ('$Company_name','$CompanyLogo','$Company_Location','$Company_desc','$OpenTime','$CloseTime','$Company_Phone','$Country','$city')";



   mysqli_query($conn,$query);
   $queryS="SELECT Com_id FROM companies WHERE Com_name='$Company_name'";

  $result  = mysqli_query($conn,$queryS);
  $row=mysqli_fetch_assoc($result);

    $queryT="INSERT INTO  com_admins (Com_Admin_Name,Com_Admin_Email,Com_Admin_phone,Com_Admin_password,Com_Admin_Image,Com_Admin_master,Company_ID) VALUES ('$Owner_Name','$Owner_Email','$Owner_Phone','$Owner_Password','$OwnerImage','1','{$row['Com_id']}')";
    
        mysqli_query($conn,$queryT);
  


    
    
  

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
                        <h3 class=" col-12 text-center card-title">ADD NEW COMPANY </h3>
                        <hr>
                        

                            
                        <form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
                            <h4 class="card-title">OWNER INFORMATION</h4>
                            <hr>
                            <div class="row" >

                                <div class="col-6 form-group">
                                    <label>OWNER FIRST NAME</label>
                                    <input type="text" class="form-control"  name="com_OWNER_Fname" >
                                </div>

                                <div class="col-6 form-group">
                                    <label>OWNER LAST NAME</label>
                                    <input type="text" class="form-control"  name="com_OWNER_Lname" >
                                </div>
                                
                            </div>
                            <div class="row" >

                                <div class="col-6 form-group">
                                    <label>OWNER PHONE</label>
                                    <input type="text" class="form-control"  name="Owner_Phone" >
                                </div>
                                <div class="col-6 form-group">
                                    <label>OWNER EMAIL</label>
                                    <input type="text" class="form-control"  name="Owner_Email" >
                                </div>
                               
                                
                            </div>
                            <div class="row" >

                                

                                <div class="col-6 form-group">
                                    <label>OWNER PASSWORD</label>
                                    <input type="PASSWORD" class="form-control"  name="Owner_Password" >
                                </div>
                                <div class=" col-6 form-group">
                                    <label>OWNER PHOTO</label>
                                    <input name="OwnerImage"  type="file" class="form-control">
                                </div>
                                
                            </div>
                             <hr>
                            <h4 class="card-title">COMPANY INFORMATION </h4>
                            <hr>
                            <div class="row" >

                                <div class="col-6 form-group">
                                    <label>COMPANY NAME</label>
                                    <input type="text" class="form-control"  name="Company_name" >
                                </div>

                                 <div class=" col-6 form-group">
                                    <label>COMPANY LOGO</label>
                                    <input name="CompanyLogo"  type="file" class="form-control">
                                </div>

                            </div>

                            <div class="row" >
                                <div class="  col-6 form-group">
                                    <label>COMPANY DESCRIPTION</label>
                                    <input   type="text" class="form-control"  name="Company_desc" > 

                                </div>
                                <div class=" col-6 form-group">
                                    <label for="example-email">COMPANY PHONE</label>
                                    <input type="text" id="example-mobile" name="Companphone" class="form-control" maxlength="1000">
                                </div>
                               </div>
 <hr>
                                <b>Company Location</b>
                                <hr>
                                <div class="row">
                               <select name="country"  class="col-3 mr-5 custom-select  countries order-alpha " id="countryId" style="h" 

>
    <option value="">Select Country</option>
</select>
<select name="state" class=" col-3 mr-5 custom-select states order-alpha selectpicker " id="stateId" >
    <option value="">Select State</option>
</select>


                                 <div class=" col-5 form-group">
                                    <input placeholder="GOOGLE MAP " type="text" id="example-mobile" name="Company_Location" class="form-control" maxlength="1000">
                                </div>

                            </div>
                           
                              

                                <!-- <div class="form-group col-3  ">

                                    <label>OPEN DAYS</label>

                                   <div class="col-sm-4">

                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" value="FRI" name="FRI">
                                            <label class="custom-control-label" for="customCheck1">FRIDAY</label>
                                        </div>


                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" value="SUN" name="SUN">
                                            <label class="custom-control-label" for="customCheck2">SUNDAY</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3"  value="MON" name="MON">
                                            <label class="custom-control-label" for="customCheck3">MONDAY</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" value="TUE" name="TUE">
                                            <label class="custom-control-label" for="customCheck4">TUESDAY</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" value="WED" name="WED">
                                            <label class="custom-control-label" for="customCheck5">WEDNESDAY</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" value="THU" name="THU">
                                            <label class="custom-control-label" for="customCheck6">THURSDAY</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" value="SAT" name="SAT">
                                            <label class="custom-control-label" for="customCheck7">SATURDAY</label>
                                        </div>
                                        
                                    </div>
                                </div> -->
                                <div class="form-group col-12   " >

                                   

                                   <div class=" row col-sm-8 ">

                                         <label>OPEN ON &nbsp;&nbsp;</label>
                                        <div class>
                                            <input type="time"  class=" mr-5 time-4" name="OpenTime">
                                        </div>
                                       

                                        <label>CLOSE ON &nbsp;&nbsp;</label>
                                        <div class>
                                            <input type="time"  class=" time-4"  name="CloseTime">
                                        </div>


                                        
                                        
                                    </div>
                                </div>




                        




                            <div class="form-group col-12 text-right  ">

                                <button  type="submit " name="submit" class=" mt-2 col-2 btn btn-success" name="ADD"  > ADD </button>

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
<?php
include("../../../../includes/Company_admin_header.php");



$queryS   = "SELECT * FROM services WHERE service_id ={$_GET['serviceID']}";
$resultS  = mysqli_query($conn,$queryS);
$row     = mysqli_fetch_assoc($resultS);
if ($row['company_id']!=$company_id) {
header("location:index.php");
}
$path          ="upload/";
if (isset($_POST['submit'])) {

  $ServiceName        =$_POST['service_name'];
  $ServiceCost        =$_POST['service_COST'];
  


 
  $query="UPDATE services SET service_name  ='$ServiceName',
                              service_cost      ='$ServiceCost'

  WHERE service_id = {$_GET['serviceID']}";

  

mysqli_query($conn,$query);

header("location:manage_services.php");

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
            <h4 class="card-title">EDIT TYPE</h4>

            <form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
              <div class="row" >
                <div class="col-6 form-group">
                  <label>SERVICE NAME</label>
                  <input value="<?php echo($row['service_name']); ?>" type="text" class="form-control" required="" name="service_name" >
                </div>
                <div class="col-6 form-group">
                  <label>SERVICE COST</label>
                  <input value="<?php echo($row['service_cost']); ?>" type="number" class="form-control" required="" name="service_COST" >
                </div>
               


            </div>
            <div class="form-group col-12 text-center  ">

              <button type="submit " name="submit" class=" mt-2 col-4 btn btn-success"   > UPDATE </button>

            </div>



          </form>
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
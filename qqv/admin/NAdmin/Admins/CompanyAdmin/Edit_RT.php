<?php
include("../../../../includes/Company_admin_header.php");
$queryS      = "SELECT * FROM rooms_and_tables WHERE id ={$_GET['ID']}";
$resultS     = mysqli_query($conn,$queryS);
$row         = mysqli_fetch_assoc($resultS);
if ($row['company_id']!=$company_id) {
header("location:index.php");
}

$path          ="../upload/";
$imageNAme=$_GET['imageName'];
if (isset($_POST['submit'])) {

  $TorR             =$_POST['RorT'];

  if ($TorR==1) {
    $Name       ="Room  : ".$_POST['name'];
}
else $Name        ="Table : ".$_POST['name'];
  
  // $Name             =$_POST['name'];
  $Cost             =$_POST['cost'];
  $sizee            =$_POST['sizee'];
  $RTDesc           =$_POST['RTdesc'];
  $Image            =$_FILES['photo']['name'];
  $tmp_name         =$_FILES['photo']['tmp_name'];


  move_uploaded_file($tmp_name,$path.$Image);




  if ($_FILES['photo']['error']==0) {



   $query="UPDATE rooms_and_tables SET name ='$Name',
                                       cost            ='$Cost', 
                                       is_Room         ='$TorR', 
                                       size            ='$sizee',
                                       Description     ='$RTDesc',
                                       image           ='$Image'

                                       
   WHERE id = {$_GET['ID']}";
 }
 else{
  $query="UPDATE rooms_and_tables SET  name            ='$Name',
                                       cost            ='$Cost', 
                                       Description     ='$RTDesc',
                                       size            ='$sizee',
                                       is_Room         ='$TorR'

  WHERE id = {$_GET['ID']}";
}


mysqli_query($conn,$query);
// echo "$query";
// die();
header("location:manage_roomsAndTables.php");

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
            <h4 class="card-title">EDIT <?php if ($row['is_Room']==1) {
              echo "ROOM";
            }
            else
              echo "TABLE "; ?></h4>

            <form   method="post" class="form-horizontal m-t-10" enctype="multipart/form-data" >
              <div class="row" >
                <div class="col-6 form-group">
                  <label>NAME</label> 

                  <input <?php 

$last_word_start = strrpos($row['name'], ':') + 1; // +1 so we don't include the space in our result
$last_word = substr($row['name'], $last_word_start);

             echo "value='$last_word'";    ?> type="text" class="form-control" required="" name="name" >
                </div>
                <div class="col-6 form-group">
                  <label>COST</label>
                  <input value="<?php echo($row['cost']); ?>" type="number" class="form-control" required="" name="cost" >
                </div>
                <div class="col-6 form-group">
                    <label> SIZE</label>
                    <input value="<?php echo($row['size']); ?>" type="number" class="form-control" required="" name="sizee" >
                  </div>
                  <div class="col-6 form-group">
                    <label> Description</label>
                    <input value="<?php echo($row['Description']); ?>&nbsp;"  type="text" class="form-control" required="" name="RTdesc" >
                  </div>
                

                <div class="col-6 form-group">
                  <label>ROOM OR TABLE</label>
                  <select class="custom-select custom-select-s mb-3" name="RorT">


                    <?php
                    if ($row['is_Room']==1) {
                      echo "<option  selected value='1' >ROOM</option>";
                      echo "<option   value='0' >TABLE</option>";

                    }
                    else{
                     echo "<option   value='1' >ROOM</option>";
                    
                   echo "<option  selected value='0' >TABLE</option>";



                 }

                 ?>
               </select>
             </div>





             <div class=" col-6 form-group">
              <label>PHOTO</label>
              <input name="photo"  type="file" class="form-control">
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
<?php

$path          ="../upload/";



include("../../../../includes/admin_header.php");




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
                            <th scope="col">Company Logo</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Phone</th>
                            <th scope="col">View</th>
                            <!-- <th scope="col">Edit</th> -->
                            <th scope="col">Delete</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>

                       <?php

                       $query   ="SELECT * FROM companies";
                       $result  = mysqli_query($conn,$query);

                       $counter=1;
                       while ($row=mysqli_fetch_assoc($result)) {
                          
                         echo "<tr>"; 
                         echo "<td>  $counter </td>";
                         echo "<td style='height:150px;width:150px; background-image:url($path{$row['Com_logo']}) ;background-repeat:no-repeat; background-position: center;background-size: cover ' > </td>";
                         
                         echo "<td> {$row['Com_name']} </td>";
                         echo "<td> {$row['Company_phone']} </td>";
                         
                         
                         // echo " <td><a style='width: 75px ; line-height:60px' class='btn btn-success ' href='Delete_company.php?comID={$row['Com_id']}&imageNameC=$path{$row['Com_logo']}&imageNameO=$path{$row['Owner_photo']}' ><b> EDIT<b></a></td>";  

                         echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:150px' class='btn btn-primary ' href='ViewcompanyDetails.php?comID={$row['Com_id']}&imageNameC=$path{$row['Com_logo']}' ><b> VIEW<b></a></td>";
                          echo " <td style='width: 122px';  class='p-0' ><a style='width: 100% ; line-height:150px' class='btn btn-danger ' href='Delete_company.php?comID={$row['Com_id']}&imageNameC=$path{$row['Com_logo']}' ><b> DELETE<b></a></td>";
                         
                         
                         
                         $counter++;
                         echo "</tr>"; 
                     }
                         if($counter==1){ echo "<td class='text-center' colspan='7' >  No Companies</td>"; }
                     
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

        
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
</div>
 </div>
<?php
include("../../../../includes/admin_footer.php");

?>
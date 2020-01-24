<?php
include("../../../../includes/admin_header.php");

?>

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
           
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12 " >
                        <div class="card"   >
                            <div class="card-body">
                                <h4 class="card-title">INBOX</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                                <!-- Comment Row -->
                               
                                <!-- Comment Row -->
                               <?php   $queryL   ="SELECT *
    FROM contactus
    WHERE company_id ='0' ORDER BY `contactus`.`ID` DESC ";

    $resultL  = mysqli_query($conn,$queryL);
    $COUNT=1;
   while ($rowL=mysqli_fetch_assoc($resultL)) {

    $date=substr($rowL['MessageDate'], 0, -3);

     echo " <div class='d-flex flex-row comment-row m-t-0'>
                                    <div class='p-2'>
                                      
                                    </div>
                                    <div class='comment-text w-100'>
                                    <div class='row'>
                                        <h6 class='col-6 font-medium'>{$rowL['M_Subject']}-{$rowL['Name']}
                                        
                                        <h6  class=' col-6 text-right font-medium'>{$rowL['Mobile']}</h6></div>
                                        <span class='m-b-15 d-block'>{$rowL['Message_Body']} </span>
                                        <div class='comment-footer row'>
                                            <span class=' col-6 text-muted float-right'>{$rowL['Email']}</span>
                                            <span class='col-6 text-right text-muted float-right'>$date</span>
                                           
                                        </div>
                                    </div>
                                </div>";
    $COUNT++;
    } 
    if ($COUNT==1) {
       echo "<div class='d-flex flex-row comment-row m-t-0 col-12'>
                                    NO MESSAGES
                                </div>";
    }







                               ?>
                                <!-- Comment Row -->
                               
                                <!-- Comment Row -->
                               
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                


                                <?php
$queryA="SELECT COUNT(*) FROM customer";
$resultA  = mysqli_query($conn,$queryA);
$rowA=mysqli_fetch_assoc($resultA);
$queryB="SELECT COUNT(*) FROM customers_request";
$resultB  = mysqli_query($conn,$queryB);
$rowB=mysqli_fetch_assoc($resultB);



                                ?>
                                <div class="m-t-30">
                                    <div class="row text-center">
                                        <div class="col-6 border-right">
                                            <h4 class="m-b-0"><?php  echo "{$rowA['COUNT(*)']}"; ?></h4>
                                            <span class="font-14 text-muted">Users</span>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="m-b-0"><?php  echo "{$rowB['COUNT(*)']}"; ?></h4>
                                            <span class="font-14 text-muted">Requests</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
           <?php
include("../../../../includes/admin_footer.php");

?>
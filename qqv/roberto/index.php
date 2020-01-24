    <?php include("../includes/RobertoHeader.php");

 $queryROOM="SELECT * FROM rooms_and_tables WHERE is_Room=1 AND Company_id=$ComID ORDER BY RAND()  ";

                    $resultROOM  = mysqli_query($conn,$queryROOM);

                    $rowROOM=mysqli_fetch_assoc($resultROOM);


                    $queryTABLE="SELECT * FROM rooms_and_tables WHERE is_Room=0 AND Company_id=$ComID ORDER BY RAND()  ";

                    $resultTABLE  = mysqli_query($conn,$queryTABLE);

                    $rowTABLE=mysqli_fetch_assoc($resultTABLE);


 ?>
    <!-- Welcome Area Start -->
    <section class="welcome-area "   >
        <div class="welcome-slides owl-carousel" >
            <!-- Single Welcome Slide -->
            <div   class="single-welcome-slide bg-img bg-overlay"     <?php

echo "style='background-image: url($path{$rowROOM['image']});'";


              ?>    >
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                     <h2 data-animation="fadeInLeft" data-delay="500ms">Welcome To <span style="color: orange"> <b><?php echo "{$row['Com_name']}";  ?></b></span></h2> 
                                    <h6 data-animation="fadeInLeft" data-delay="200ms">Meeting Rooms</h6>
                                   
                                    <a href="MRooms.php" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">MAKE A RESERVATION </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" <?php

echo "style='background-image: url($path{$rowTABLE['image']});'";


              ?>  >
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                      <h2 data-animation="fadeInDown" data-delay="500ms">Welcome To <span style="color: orange"> <b><?php echo "{$row['Com_name']}";  ?></b></span></h2>
                                    <h6 data-animation="fadeInDown" data-delay="200ms">TABLES</h6>
                                  
                                    <a href="MTables.php" class="btn roberto-btn btn-2" data-animation="fadeInDown" data-delay="800ms">MAKE A RESERVATION</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- About Us Area Start -->

    <!-- Service Area Start -->
    
    <!-- Service Area End -->

    <!-- Our Room Area Start -->
    
    <!-- Our Room Area End -->

    <!-- Testimonials Area Start -->
    <!-- Blog Area End -->

    <!-- Call To Action Area Start -->
  
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    
    <!-- Partner Area End --><?php include("../includes/Robertofooter.php");
 ?>
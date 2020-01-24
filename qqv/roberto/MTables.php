    <?php include("../includes/RobertoHeader.php");
if (isset($_GET['Message'])) {
echo "<script type='text/javascript'>alert('SORRY THIS Table NOT Available');</script>";
}


    ?>




    <!-- Breadcrumb Area Start -->
    <div class=" breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/18.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">OUR TABLES</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 " id="m">
                    <!-- Single Room Area -->

<!-- Company_id=$ComID AND -->
                    <?php   $queryAll="SELECT * FROM   rooms_and_tables WHERE Company_id=$ComID AND  is_Room=0  ";

                    $resultALL  = mysqli_query($conn,$queryAll);

                    while ($rowALL=mysqli_fetch_assoc($resultALL)){ 

                       echo " <div class='border  pl-0 col single-room-area d-flex align-items-center mb-50 wow fadeInUp' data-wow-delay='500ms'>
                       <!-- Room Thumbnail -->
                       <div class='room-thumbnail'>
                       <img style='width: 100% ;height: 200px' src='$path{$rowALL['image']}' alt=''>
                       </div>
                       <!-- Room Content -->
                       <div class='room-content'>
                       <h2>";

$last_word_start = strrpos($rowALL['name'], ':') + 1; // +1 so we don't include the space in our result
$last_word = substr($rowALL['name'], $last_word_start);
 echo $last_word;

                       echo "</h2>
                       <h4>{$rowALL['cost']} $ <span>/ Hour</span></h4>

                       <h6 >Capacity: <span>  {$rowALL['size']} person at max</span></h6>

                    
                       </div>
                       </div> ";
                   }

                   ?>
                   <!-- Single Room Area -->


                   <!-- Pagination -->
                   <!-- <div style='width: 100% ;height: 100%'></div> -->
               </div>
               <head>
    <script src="../ajax.js"></script>
    <script type="text/javascript">


        $(document).ready(function()
        {
          $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#ONdate').attr('min', minDate);
});
           

            $("#Tabless").click(function()
            {
                    var TRsize    = $("#Capacity").val();
                    var BokDate   = $("#ONdate").val();
                    var duration  = $("#numberOFHours").val();
                    var StrtTime  = $("#Start_Time").val();
                 
                $.ajax(
            { 
                type: "GET",
                url: "RandTAjax.php?ComID="+ <?php echo "$ComID "?>+"&RorT="+0+"&BokDate="+BokDate+"&TRsize="+TRsize+"&duration="+duration+"&startTime="+StrtTime,
                success: function(data)
                {

                     $("#m").html(data);

                }
            });
               });


            // -------------------
            
        });
    </script></head>

               <div class="col-12 col-lg-4">
                <!-- Hotel Reservation Area -->
                <div class="hotel-reservation--area mb-100">
                    <form action="#" method="post">
                        <div class="form-group mb-30 ">
                            <label class="col-12 text-center" for="checkInDate">Date</label>
                            <div class="input-date " id="datepicker">
                                <div class="row no-gutters ">
                                    <div class="col-12">

                                       <div class="col-12">
                                       <input id="ONdate" name="ONdate"  title=" Choose your desired date" type="date" class="form-control col-12 mb-2"   value= <?php $now = new DateTime();
echo $now->format('Y-m-d');    // MySQL datetime format
 ?>
                                    </div>



                                </div>


                            </div>
                        </div><div class="row" >
                            <div class="col-5 mt-4 ">
                             <label class="col-12 text-center" >AT :  </label>
                             <input  name="Start_Time" id="Start_Time" title="Choose your desired Start Time " placeholder="Start Time" type="time" value="10:00" class="   form-control col-12 mr-3 p-3 text-left  " max="22:00" min="8:00" /><br>
                         </div>

                         <div class="col-6  mt-4 ">
                             <label class="col-6 text-center" >FOR :</label>
                             <div class="row">
                                <input  name="numberOFHours" id="numberOFHours"   value="1" type="number"  class="   form-control col-6 mr-3 pl-4 text-center  " step="1.00" min="1" /> 
                                <label style="line-height: 50px" >HOURS </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mb-30">

                        <div class="row">
                            <div class="col-12">
                                <select  name="Capacity" id="Capacity" class="form-control">
                                    <option disabled="" selected="" value="null">Number of persons</option>
                                    <option value="6">1</option>
                                    <option value="7">2</option>
                                    <option value="8">3</option>
                                    <option value="9">4</option>
                                  
                                </select>
                            </div>

                        </div>
                    </div>

                    <div  class="form-group col-12 text-center">
                        <div  style="" id="Tabless"   class=" col-8 btn roberto-btn w-100">Check Available</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Rooms Area End -->

<!-- Call To Action Area Start -->

<!-- Call To Action Area End -->

<!-- Partner Area Start -->

<!-- Partner Area End -->



<?php 

include("../includes/Robertofooter.php");

?>
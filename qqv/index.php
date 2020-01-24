<?php 

include("includes/public_header.php");


 ?>

<div class="home" >
		
		<!-- Home Slider -->
		<div class="home_slider_container" >
			<div class="owl-carousel owl-theme home_slider" >
				
				<!-- Slide -->
				<div class="owl-item" >
					<div  class="background_image " style="  background-image:url(5910112.jpg)"></div>
					<div  class="home_slider_content_container ">
						<div  class="container ">
							<div  class="row">
								<div class="col">
									<div  class="p-3 home_slider_content">
										<div style="background-color:rgb(255, 255, 153,0.7)

" class="home_title p-2"><h2 style="color: #003300
;



">Let us find  best VENUE for you </h2></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				

				<!-- Slide -->
				

			</div>

			
		</div>
	</div>

	<!-- Search -->
	
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#countryId").change(function()
                {
                    //get selected parent option 
                    var C_Name = $("#countryId").val();
                    //alert(C_Name);
                    $.ajax(
                            {
                                type: "GET",
                                url: "cityAJAX.php?C_Name=" + C_Name,
                                success: function(data)
                                {
                                    $("#stateId").html(data);
                                    
                                }
                            });
                });

           
            $("#stateId").change(function()
                {
                    //get selected parent option 
                    var C_Name = $("#countryId").val();
                    var S_name = $("#stateId").val();
                    //alert(C_Name);
                    $.ajax(
                            {
                                type: "GET",
                                url: "CompanyAjax.php?C_Name=" + C_Name+"&S_name="+S_name,
                                success: function(data)
                                {
                                    $("#Comp").html(data);
                                    
                                }
                            });
                });

            });
        </script>
       

	<div  class="home_search  ">
		<div  class="container  ">
			<div  class="row">
				<div  class="col">
					<div   class="home_search_container ">
						<div class="home_search_title ">Search for VENUES IN </div>
						<div class="home_search_content" >
							<form action="#" class="home_search_form" id="home_search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									
                         <select required="" name='countryId' id='countryId'   class=" col-5  ml-5 search_input search_input_1 " 

                         >
                            <option    value="NO"> Select Country  </option>
                         <?php   $query   ="SELECT `Com_Country` FROM companies GROUP BY `Com_Country`";
                           $result  = mysqli_query($conn,$query);

                     
                           while ($row=mysqli_fetch_assoc($result)) {
echo " <option   value='{$row['Com_Country']}'>{$row['Com_Country']}</option>";



                           } ?>
                      





                     </select>
                     <select   name="state" class="ml-5 col-5 search_input search_input_2 " id="stateId" >
                        <option  value="NO">Select State</option>
                     </select>

                    <br>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- Intro -->

	

	<!-- Destinations -->

	<div class=" destinations" id="destinations">
		<div class="container " >
			<div class="row">
				<div class="col text-center">
					<div class="section_subtitle">simply amazing Venue</div>
					<div class="section_title"><h2>Popular Venues</h2></div>
				</div>
			</div>
			<div class="row destinations_row mt-4" >
				<div class="col">
					<div class=" row destinations_container " id="Comp"    >

				<?php	$query="SELECT * FROM companies ";
$result = mysqli_query($conn,$query);
// echo "$query";
 while ($row=mysqli_fetch_assoc($result)) {

                           
                             echo " <!-- <title></title> --> <div class='col-4 destination item' >
						<a href='roberto/setcookie.php?ComID={$row['Com_id']}'>	<div class='destination_image'>
								<img src='$path{$row['Com_logo']}' alt=''>
								
							</div>
							<div class='destination_content ml-5 '>
								<div class='destination_title'>{$row['Com_name']}</div>
								<div class='destination_subtitle'><p>{$row['com_description']}.</p></div>
								<div class='destination_price'>{$row['Com_Country']}-{$row['Com_CITY']}</div>
							</div></a>
						</div><!-- <title></title> -->
";
}	?>






	
               

					
</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Testimonials -->

	

	<!-- News -->

	
 <?php 

include("includes/public_footer.php");


 ?>
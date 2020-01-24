

<?php
$counter=1;
$company_id   	=$_GET['ComID'];
$path="admin/NAdmin/Admins/upload/";

$conn = mysqli_connect("localhost","root","","qqp");
if ($_GET['type_id']=="all") {
	$query   ="SELECT *
FROM services WHERE company_id = $company_id  ";
}
else{
$query   ="SELECT *
FROM services WHERE
type_id	={$_GET['type_id']} ";}
$result = mysqli_query($conn, $query);
echo "<div  class='row  text-center align-items-center '' >";

while ($row=mysqli_fetch_assoc($result)) {

	echo "   <form method='post' class='col-5'>
	<input type='number' name='Cost' hidden='' value='{$row['service_cost']}'>
	<input type='number' name='Cost' hidden='' value='{$row['company_id']}'>


                <div class='single-features-area col-12 p-0  ml-4 '>
                    <img style='height: 100px ;width:100%' src='$path{$row['service_image']}' alt=''>
                    <!-- Price -->
                    <div class='price-start '>
                        <p class='pr-1 pl-1'>{$row['service_cost']}$</p>
                    </div>
                    <div class='feature-content  align-items-center justify-content-between p-0 text-center'>
                        <div class='feature-title row  ''>
                            <h5 class='col-9'>{$row['service_name']}</h5>
                         
                            <button name='addToCart' type='submit' value={$row['service_id']} class='p-0 btn btn-success col-2 '' ><b>+</b></button>
                          
                        </div>
                       
                    </div>
                    </div>
                    	</form>
                ";

	$counter++;

	; 


}
 if($counter==1){ echo " <p class='text-center col-12 >  EMPTY </p>"; }
 

?>

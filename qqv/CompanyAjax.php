<?php
$path="admin/NAdmin/Admins/upload/";
$conn = mysqli_connect('localhost','root','','qqp');

$query="SELECT * FROM companies WHERE `Com_Country`='{$_GET['C_Name']}' AND `Com_CITY`='{$_GET['S_name']}'";
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
}
echo '<script>window.top.location="#destinations"</script>';
?>
<?php
echo " <option   value=''>Select State </option>";

$conn = mysqli_connect('localhost','root','','qqp');

$query="SELECT `Com_CITY` FROM companies WHERE `Com_Country`='{$_GET['C_Name']}' GROUP BY `Com_CITY`";
$result = mysqli_query($conn,$query);

 while ($row=mysqli_fetch_assoc($result)) {
echo " <option   value='{$row['Com_CITY']}'>{$row['Com_CITY']}</option>";



                           } 

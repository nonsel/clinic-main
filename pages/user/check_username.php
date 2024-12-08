<?php
	//mysql query to select field username if it's equal to the username that we check '  
include "../connection.php";
$result = mysqli_query($con,"SELECT username FROM tbluser where username = '".$_POST['username']."' ");
echo $cnt = mysqli_num_rows($result);
// $result = $con -> query("SELECT * FROM tblteacher WHERE `username`='".$_POST['username']."'");
// print_r($con->mysql_error());
// if ($result) {
//   echo "Returned rows are: " . $result -> num_rows;
//   // Free result set
//   $result -> free_result();
// }else{
// 	echo 12;
// }


?>
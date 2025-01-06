<?php
	//mysql query to select field username if it's equal to the username that we check '  
include "../connection.php";
$result = mysqli_query($con,"select doc_short from tbltype where doc_short = '".$_POST['doc_short']."' ");
$cnt = mysqli_num_rows($result);
print($cnt);
?>
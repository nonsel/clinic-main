<?php

include "../connection.php";

$stmt = $con->prepare("SELECT * FROM tblproduct WHERE status='ACTIVE'");

$stmt->execute();

$featured_products = $stmt->get_result();
?>

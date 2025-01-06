<?php

include "../connection.php";
session_start();
if(isset($_POST['get_product'])){

        $sql = "SELECT * FROM tblproduct WHERE id = ".$_POST['id']." LIMIT 1";
        $result = $con->query($sql);

        $data = [];

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $temp = [];
            foreach ($row as $key => $value) {
              $temp[$key] = $value !== null ? htmlentities($value) : '';
            }
            $data[] = $temp;
        }

        echo json_encode($data);

}

if (isset($_POST['update'])) {

    $id= $_POST['id'];
    $name= $_POST['name'];
    $code = $_POST['code'];
    $category = $_POST['cat_id'];

    if($category==1){

        $lens_type = $_POST['lens_type'];
        $lens_coating = $_POST['lens_coating'];
        $prescription = $_POST['prescription'];

        $date_ordered = "";
        $frame_brand = "";
        $frame_type = "";

    }else{

        $lens_type = "";
        $lens_coating = "";
        $prescription = "";

        $date_ordered = $_POST['date_ordered'];
        $frame_brand = $_POST['frame_brand'];
        $frame_type = $_POST['frame_type'];

    }

    $supplier = $_POST['supplier_id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $date_updated = date("Y-m-d");

    // Check if the user is logged in and log the action
    if (isset($_SESSION['role'])) {
        $action = 'Added Category: ' . $category;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }


    $sql = "UPDATE 
                tblproduct 
            SET 
                name='$name',
                code='$code',
                cat_id='$category',
                lens_type='$lens_type',
                lens_coating='$lens_coating',
                prescription='$prescription',
                date_ordered='$date_ordered',
                frame_brand='$frame_brand',
                frame_type='$frame_type',
                supplier_id='$supplier',
                price='$price',
                qty='$qty',
                date_updated='$date_updated'
            WHERE 
                id = '$id'";

    
    $query = mysqli_query($con,$sql) or die('Error: ' . mysqli_error($con));

}

if( isset($_POST['btn_delete']) ){

    $id = $_POST['id'];

    $sql = "UPDATE 
                tblproduct 
            SET 
                is_delete=1
            WHERE 
                id='$id'";

    if ($con->query($sql) === TRUE) {
        $action = 'Delete Product: ' . $_POST['id'];
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");

    } else {
        echo "Error updating record: " . $con->error;
    }

}





?>
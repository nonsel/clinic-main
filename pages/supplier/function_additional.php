<?php

include "../connection.php";
session_start();
if(isset($_POST['get_supplier'])){

        $sql = "SELECT * FROM tblsupplier WHERE id = ".$_POST['id']." LIMIT 1";
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

if( isset($_POST['btn_delete']) ){

    $id = $_POST['id'];

    $sql = "UPDATE 
                tblsupplier 
            SET 
                is_delete=1
            WHERE 
                id='$id'";

    if ($con->query($sql) === TRUE) {
      // echo "Record updated successfully";

        $action = 'Delete Supplier: ' . $_POST['id'];
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");

    } else {
        echo "Error updating record: " . $con->error;
    }

}





?>
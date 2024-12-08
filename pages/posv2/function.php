<?php
include "../connection.php";
if (isset($_POST['btn_add'])) {
    $hidden_productid = $_POST['hidden_productid'];
    $txt_quantity = $_POST['txt_quantity'];
    $txt_id = $_POST['hidden_id'];

    $currentDate = date("mdY");
    
    $orderCountQuery = mysqli_query($con, "SELECT COUNT(id) AS orderCount FROM tblorder WHERE DATE(date_created) = CURDATE()");
    
    $orderCount = 1; // Default value if no orders for the day
    if ($orderCountQuery) {
        $row = mysqli_fetch_assoc($orderCountQuery);
        $orderCount = $row['orderCount'] + 1;
    }
    
    $formattedOrderCount = sprintf("%04d", $orderCount);
    
    $transno = $currentDate . "-" . $formattedOrderCount;

    $query = mysqli_query($con, "INSERT INTO tblorder (product_id, quantity, date_created, date_updated, user_id, transno)
        VALUES ('$hidden_productid', '$txt_quantity', NOW(), NOW(), '$txt_id', '$transno')") or die('Error: ' . mysqli_error($con));
    
    if ($query == true) {
        $_SESSION['added'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_delete']))
{
    $txt_id = $_POST['hidden_id'];
  
    $delete_query = mysqli_query($con,"DELETE FROM tblorder where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($delete_query == true){
        $_SESSION['delete'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}

if (isset($_POST['btn_checkout'])) {
    $txt_customer = $_POST['txt_customer'];
    $txt_total = $_POST['txt_total'];
    $txt_cash = $_POST['txt_cash'];
    $txt_change = $_POST['txt_change'];
    $user_id = $_SESSION['userid'];

    // Get the existing transno from tblorder for the current date
    $existing_transno_query = mysqli_query($con, "SELECT MAX(transno) AS max_transno FROM tblorder WHERE transno LIKE '" . date('mdY') . "-%'");
    $row = mysqli_fetch_assoc($existing_transno_query);
    $existing_transno = $row['max_transno'];

    // If there's no existing transno for today, create a new one
    if (empty($existing_transno)) {
        $transno = date('mdY') . '-0001';
    } else {
        // Split the existing transno to extract the counter
        list($current_date, $counter) = explode('-', $existing_transno);

        // Increment the counter
        $new_counter = str_pad(intval($counter) + 1, 4, '0', STR_PAD_LEFT);

        // Create the new transno
        $transno = $current_date . '-' . $new_counter;
    }

    // Start a transaction to ensure atomicity
    mysqli_begin_transaction($con);

    try {
        // Update tblorder with transno, customer, total, cash, and change
        $update_order_query = mysqli_query($con, "UPDATE tblorder SET transno = '$transno', customer='$txt_customer', total='$txt_total', cash='$txt_cash', `change`='$txt_change' WHERE user_id = '$user_id' AND transno IS NULL");

        if (!$update_order_query) {
            throw new Exception('Error updating tblorder: ' . mysqli_error($con));
        }

        // Update tblproduct quantities based on tblorder
        $update_product_query = mysqli_query($con, "UPDATE tblproduct
                                                   INNER JOIN tblorder ON tblproduct.id = tblorder.product_id
                                                   SET tblproduct.qty = tblproduct.qty - tblorder.quantity
                                                   WHERE tblorder.user_id = '$user_id' AND tblorder.transno = '$transno'");

        if (!$update_product_query) {
            throw new Exception('Error updating tblproduct: ' . mysqli_error($con));
        }

        // If everything is successful, commit the transaction
        mysqli_commit($con);

        $_SESSION['added'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    } catch (Exception $e) {
        // If an error occurred, rollback the transaction
        mysqli_rollback($con);

        $_SESSION['error'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}









?>



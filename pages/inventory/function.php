<?php

if (isset($_POST['btn_add_inventory'])) {
    $product_name = $_POST['txt_product_name'];
    $price = $_POST['txt_price'];
    $supplier_id = $_POST['txt_supplier_id'];
    $stock_quantity = $_POST['txt_stock_quantity'];
    if (empty($product_name) || empty($price) || empty($supplier_id) || empty($stock_quantity)) {
        echo 'All fields are required.';
        exit;
    }
    if (isset($_SESSION['role'])) {
        $action = 'Added Inventory Item with Product Name: ' . $product_name;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
    }

    $stmt = mysqli_prepare($con, "INSERT INTO tblinventory (product_name, price, supplier_id, stock_quantity) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sdii', $product_name, $price, $supplier_id, $stock_quantity);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            header("Location: " . $_SERVER['REQUEST_URI']);
        } else {
            echo 'Error inserting record: ' . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error preparing statement: ' . mysqli_error($con);
    }
}

if (isset($_POST['btn_save'])) {
    $id = $_POST['hidden_id'];
    $product_name = $_POST['txt_product_name'];
    $price = $_POST['txt_price'];
    $supplier_id = $_POST['txt_supplier_id'];
    $stock_quantity = $_POST['txt_stock_quantity'];

    $update_query = mysqli_query($con, "UPDATE tblinventory SET 
        product_name = '$product_name',
        price = '$price',
        supplier_id = '$supplier_id',
        stock_quantity = '$stock_quantity'
        WHERE id = '$id'")
        or die('Error: ' . mysqli_error($con));

    if ($update_query) {
        if (isset($_SESSION['role'])) {
            $action = 'Edited Inventory Item with ID: ' . $id . 
                      ', Product Name: ' . $product_name . 
                      ', Price: ' . $price . 
                      ', Supplier ID: ' . $supplier_id . 
                      ', Stock Quantity: ' . $stock_quantity;

            $log_query = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) 
                                             VALUES ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
        }
        $_SESSION['edited'] = 1;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    } else {
        echo 'Error updating record: ' . mysqli_error($con);
    }
}



if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            // Prevent SQL Injection
            $stmt = mysqli_prepare($con, "SELECT product_name FROM tblinventory WHERE id = ?");
            
            // Check if the statement was prepared successfully
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $value);
                mysqli_stmt_execute($stmt);
                $record_query = mysqli_stmt_get_result($stmt);

                // Check if the record exists
                if ($record_query && mysqli_num_rows($record_query) > 0) {
                    $row = mysqli_fetch_array($record_query);
                    $product_name = $row['product_name'];

                    // Delete the record from tblinventory using prepared statement
                    $delete_stmt = mysqli_prepare($con, "DELETE FROM tblinventory WHERE id = ?");
                    if ($delete_stmt) {
                        mysqli_stmt_bind_param($delete_stmt, 'i', $value);
                        $delete_result = mysqli_stmt_execute($delete_stmt);

                        if ($delete_result) {
                            $_SESSION['delete'] = 1;

                            $action = 'Deleted Inventory Item with Product Name: ' . $product_name;
                            $log_stmt = mysqli_prepare($con, "INSERT INTO tbllogs (user, logdate, action) VALUES (?, NOW(), ?)");
                            if ($log_stmt) {
                                mysqli_stmt_bind_param($log_stmt, 'ss', $_SESSION['userid'], $action);
                                mysqli_stmt_execute($log_stmt);
                            } else {
                                echo "Error preparing log statement: " . mysqli_error($con);
                            }
                        } else {
                            echo "Error deleting record: " . mysqli_error($con);
                        }
                        mysqli_stmt_close($delete_stmt);
                    } else {
                        echo "Error preparing delete statement: " . mysqli_error($con);
                    }
                } else {
                    $_SESSION['delete'] = 1;
                    header("Location: " . $_SERVER['REQUEST_URI']);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing select statement: " . mysqli_error($con);
            }
        }
    }
}


?>
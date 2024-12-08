<?php

if (isset($_POST['btn_add'])) {
    $name = mysqli_real_escape_string($con, $_POST['txt_name']);
    $contact_number = mysqli_real_escape_string($con, $_POST['txt_contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['txt_address']);
    $date_created = date("Y-m-d");

    $query = mysqli_query($con, "INSERT INTO tblsupplier (name, contact_number, address, date_created) 
                                 VALUES ('$name', '$contact_number', '$address', '$date_created')")
                                 or die('Error: ' . mysqli_error($con));

    if ($query) {
        if (isset($_SESSION['role'])) {
            $action = 'Added Supplier with Name: ' . $name . ', Contact Number: ' . $contact_number . ', Address: ' . $address;
            $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) 
                                          VALUES ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
        }
        $_SESSION['added'] = 1;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    } 
}


if (isset($_POST['btn_save'])) {
    $id = mysqli_real_escape_string($con, $_POST['hidden_id']);
    $name = mysqli_real_escape_string($con, $_POST['txt_name']);
    $contact_number = mysqli_real_escape_string($con, $_POST['txt_contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['txt_address']);

    $update_query = mysqli_query($con, "UPDATE tblsupplier SET 
        name = '$name',
        contact_number = '$contact_number',
        address = '$address'
        WHERE id = '$id'")
        or die('Error: ' . mysqli_error($con));

    if ($update_query) {
        if (isset($_SESSION['role'])) {
            $action = 'Edited Supplier with ID: ' . $id . ', Name: ' . $name . ', Contact Number: ' . $contact_number . ', Address: ' . $address;
            $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) 
                                          VALUES ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
        }
        $_SESSION['edited'] = 1;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    } else {
        echo 'Error updating record: ' . mysqli_error($con);
    }
}


// if (isset($_POST['btn_delete'])) {
//     if (isset($_POST['chk_delete'])) {
//         foreach ($_POST['chk_delete'] as $value) {
//             // Prevent SQL Injection
//             $stmt = mysqli_prepare($con, "SELECT `name` FROM `tblsupplier` WHERE `id` = ?");
            
//             // Check if the statement was prepared successfully
//             if ($stmt) {
//                 mysqli_stmt_bind_param($stmt, 'i', $value);
//                 mysqli_stmt_execute($stmt);
//                 $record_query = mysqli_stmt_get_result($stmt);

//                 // Check if the record exists
//                 if ($record_query && mysqli_num_rows($record_query) > 0) {
//                     $row = mysqli_fetch_array($record_query);
//                     $supplier_name = $row['name'];

//                     // Delete the record from tblsupplier using prepared statement
//                     $delete_stmt = mysqli_prepare($con, "DELETE FROM `tblsupplier` WHERE `id` = ?");
//                     if ($delete_stmt) {
//                         mysqli_stmt_bind_param($delete_stmt, 'i', $value);
//                         $delete_result = mysqli_stmt_execute($delete_stmt);

//                         if ($delete_result) {
//                             $_SESSION['delete'] = 1;

//                             $action = 'Deleted Supplier with Name: ' . $supplier_name;
//                             $log_stmt = mysqli_prepare($con, "INSERT INTO tbllogs (user, logdate, action) VALUES (?, NOW(), ?)");
//                             if ($log_stmt) {
//                                 mysqli_stmt_bind_param($log_stmt, 'ss', $_SESSION['userid'], $action);
//                                 mysqli_stmt_execute($log_stmt);
//                                 mysqli_stmt_close($log_stmt);
//                             } else {
//                                 echo "Error preparing log statement: " . mysqli_error($con);
//                             }
//                         } else {
//                             echo "Error deleting record: " . mysqli_error($con);
//                         }
//                         mysqli_stmt_close($delete_stmt);
//                     } else {
//                         echo "Error preparing delete statement: " . mysqli_error($con);
//                     }
//                 } else {
//                     $_SESSION['delete'] = 1;
//                     header("Location: " . $_SERVER['REQUEST_URI']);
//                 }
//                 mysqli_stmt_close($stmt);
//             } else {
//                 echo "Error preparing select statement: " . mysqli_error($con);
//             }
//         }
//     }
// }


if (isset($_POST['btn_delete'])) {
    // if (isset($_POST['chk_delete']) && !empty($_POST['chk_delete'])) {
        // foreach ($_POST['chk_delete'] as $id) {
            $id = intval($_POST['id']); // Sanitize the ID to prevent SQL injection
            // Log the deletion action
            if (isset($_SESSION['role'])) {


                $action = 'Deleted Supplier with Name: ' . $_POST['supplier_name'];
                $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
            }
            // Delete the patient record
            $delete_query = mysqli_query($con, "DELETE FROM tblsupplier WHERE id = $id") or die('Error: ' . mysqli_error($con));
        // }
        $_SESSION['delete'] = 1;
    // } else {
        // $_SESSION['delete'] = 0;
    // }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
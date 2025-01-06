<?php
include "../connection.php";

if (isset($_POST['btn_delete'])) {
    // if (isset($_POST['chk_delete']) && !empty($_POST['chk_delete'])) {
        // foreach ($_POST['chk_delete'] as $id) {
            $id = intval($_POST['id']); // Sanitize the ID to prevent SQL injection
            // Log the deletion action
            if (isset($_SESSION['role'])) {
                $action = 'Deleted patient with ID: ' . $id;
                $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
            }
            // Delete the patient record
            $delete_query = mysqli_query($con, "UPDATE tblpatient SET is_delete = 1 WHERE id = $id") or die('Error: ' . mysqli_error($con));
        // }
    // } else {
        // $_SESSION['delete'] = 0;
    // }
    exit();
}


?>
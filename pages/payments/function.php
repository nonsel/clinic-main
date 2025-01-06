<?php
if (isset($_POST['btn_add'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $phoneno = $_POST['phoneno'];
    $adddate = $_POST['adddate'];
    $sino = $_POST['sino'];

    // Check if user is logged in and log the action
    if (isset($_SESSION['role'])) {
        $action = "Added patient with firstname: $firstname, lastname: $lastname, middlename: $middlename, phone number: $phoneno, add date: $adddate, sino: $sino";
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    // Check for duplicate patient based on Firstname and Lastname
    $su = mysqli_query($con, "SELECT * FROM tblpatient WHERE firstname = '$firstname' AND lastname = '$lastname'");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {
        // Insert new patient record
        $query = mysqli_query($con, "INSERT INTO tblpatient (firstname, lastname, middlename, phoneno, adddate, sino) 
            VALUES ('$firstname', '$lastname', '$middlename', '$phoneno', '$adddate', '$sino')") or die('Error: ' . mysqli_error($con));

        if ($query == true) {
            $_SESSION['added'] = 1;
            header("Location: " . $_SERVER['REQUEST_URI']);
        }
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("Location: " . $_SERVER['REQUEST_URI']);
    }
}


if (isset($_POST['btn_save'])) {
    // Retrieve form data
    $txt_id = mysqli_real_escape_string($con, $_POST['hidden_id']);
    $txt_edit_firstname = mysqli_real_escape_string($con, $_POST['txt_edit_firstname']);
    $txt_edit_lastname = mysqli_real_escape_string($con, $_POST['txt_edit_lastname']);
    $txt_edit_middlename = mysqli_real_escape_string($con, $_POST['txt_edit_middlename']);
    $txt_edit_phoneno = mysqli_real_escape_string($con, $_POST['txt_edit_phoneno']);
    $txt_edit_adddate = mysqli_real_escape_string($con, $_POST['txt_edit_adddate']);
    $txt_edit_sino = mysqli_real_escape_string($con, $_POST['txt_edit_sino']);

    // Check if user is logged in and log the action
    if (isset($_SESSION['role'])) {
        $action = 'Updated patient with ID: ' . $txt_id . ' to firstname: ' . $txt_edit_firstname . ', lastname: ' . $txt_edit_lastname . ', middlename: ' . $txt_edit_middlename . ', phone number: ' . $txt_edit_phoneno . ', add date: ' . $txt_edit_adddate . ', sino: ' . $txt_edit_sino;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    // Check for duplicate patient based on Firstname and Lastname excluding the current record
    $su = mysqli_query($con, "SELECT * FROM tblpatient WHERE firstname = '$txt_edit_firstname' AND lastname = '$txt_edit_lastname' AND id != '$txt_id'");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {
        // Update patient record
        $update_query = mysqli_query($con, "UPDATE tblpatient SET firstname = '$txt_edit_firstname', lastname = '$txt_edit_lastname', middlename = '$txt_edit_middlename', phoneno = '$txt_edit_phoneno', adddate = '$txt_edit_adddate', sino = '$txt_edit_sino' WHERE id = '$txt_id'") or die('Error: ' . mysqli_error($con));

        if ($update_query == true) {
            $_SESSION['edited'] = 1;
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}


if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            // Ensure that the ID is properly escaped
            $value = mysqli_real_escape_string($con, $value);

            // Fetch the patient's record to log the deletion action
            $result = mysqli_query($con, "SELECT * FROM tblpatient WHERE id = '$value'");
            $patient = mysqli_fetch_assoc($result);

            // Prepare log action details
            $action = 'Deleted patient with ID: ' . $value . ', Name: ' . $patient['firstname'] . ' ' . $patient['lastname'] . ' ' . $patient['middlename'];
            if (isset($_SESSION['role'])) {
                // Log the deletion action
                $log_query = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
            }

            // Delete the patient record
            $delete_query = mysqli_query($con, "DELETE FROM tblpatient WHERE id = '$value'") or die('Error: ' . mysqli_error($con));

            if ($delete_query) {
                $_SESSION['delete'] = 1;
            } else {
                $_SESSION['delete_error'] = 1;
            }
        }

        // Redirect to the current page to reflect changes
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}


if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete']) && !empty($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $id) {
            $id = intval($id); // Sanitize the ID to prevent SQL injection
            // Log the deletion action
            if (isset($_SESSION['role'])) {
                $action = 'Deleted patient with ID: ' . $id;
                $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
            }
            // Delete the patient record
            $delete_query = mysqli_query($con, "DELETE FROM tblpatient WHERE id = $id") or die('Error: ' . mysqli_error($con));
        }
        $_SESSION['delete'] = 1;
    } else {
        $_SESSION['delete'] = 0;
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

?>
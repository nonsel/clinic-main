<?php
if (isset($_POST['btn_add'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $phoneno = $_POST['phoneno'];
    $date_of_birth = $_POST['date_of_birth'];
    $pwd_citizen_no = $_POST['pwd_citizen_no'];
    $senior_citizen_no = $_POST['senior_citizen_no'];
    $home_address = $_POST['home_address'];
    $medical_history = $_POST['medical_history'];

    // Check if user is logged in and log the action
    if (isset($_SESSION['role'])) {
        $action = "Added patient with firstname: $firstname, middlename: $middlename,lastname: $lastname, suffix: $suffix, phone number: $phoneno, Date of Birth: $date_of_birth, PWD Citizent No: $pwd_citizen_no, Senior Citizen No: $senior_citizen_no, Home Address: $home_address, Medical History: $medical_history";
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    // Check for duplicate patient based on Firstname and Lastname
    $su = mysqli_query($con, "SELECT * FROM tblpatient WHERE firstname = '$firstname' AND lastname = '$lastname'");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {
        // Insert new patient record
        $query = mysqli_query($con, "INSERT INTO tblpatient (
                                                                firstname, 
                                                                middlename,
                                                                lastname, 
                                                                phoneno, 
                                                                suffix, 
                                                                date_of_birth,
                                                                pwd_citizen_no,
                                                                senior_citizen_no,
                                                                home_address,
                                                                medical_history
                                                            ) 
                                            VALUES (
                                                        '$firstname', 
                                                        '$middlename', 
                                                        '$lastname', 
                                                        '$phoneno', 
                                                        '$suffix', 
                                                        '$date_of_birth',
                                                        '$pwd_citizen_no',
                                                        '$senior_citizen_no',
                                                        '$home_address',
                                                        '$medical_history'
                                                    )") or die('Error: ' . mysqli_error($con));

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
    $id = mysqli_real_escape_string($con, $_POST['hidden_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['txt_edit_firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['txt_edit_middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['txt_edit_lastname']);
    $suffix = mysqli_real_escape_string($con, $_POST['txt_edit_suffix']);
    $phoneno = mysqli_real_escape_string($con, $_POST['txt_edit_phoneno']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['txt_edit_date_of_birth']);
    $pwd_citizen_no = mysqli_real_escape_string($con, $_POST['txt_edit_pwd_citizen_no']);
    $senior_citizen_no = mysqli_real_escape_string($con, $_POST['txt_edit_senior_citizen_no']);
    $home_address = mysqli_real_escape_string($con, $_POST['txt_edit_home_address']);
    $medical_history = mysqli_real_escape_string($con, $_POST['txt_edit_medical_history']);

    // Check if user is logged in and log the action
    if (isset($_SESSION['role'])) {
  
        $action = "Updated patient with ID: $id to firstname: $firstname, middlename: $middlename,lastname: $lastname, suffix: $suffix, phone number: $phoneno, Date of Birth: $date_of_birth, PWD Citizent No: $pwd_citizen_no, Senior Citizen No: $senior_citizen_no, Home Address: $home_address, Medical History: $medical_history";
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    // Check for duplicate patient based on Firstname and Lastname excluding the current record
    $su = mysqli_query($con, "SELECT * FROM tblpatient WHERE firstname = '$firstname' AND lastname = '$lastname' AND id != '$id'");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {
        // Update patient record
        $update_query = mysqli_query($con, "UPDATE 
                                                tblpatient 
                                            SET firstname = '$firstname', 
                                                middlename = '$middlename', 
                                                lastname = '$lastname', 
                                                suffix = '$suffix',
                                                phoneno = '$phoneno', 
                                                date_of_birth = '$date_of_birth', 
                                                pwd_citizen_no = '$pwd_citizen_no',
                                                senior_citizen_no = '$senior_citizen_no',
                                                home_address = '$home_address',
                                                medical_history = '$medical_history' 
                                            WHERE 
                                                id = '$id'"
                                            ) or die('Error: ' . mysqli_error($con));

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


// if (isset($_POST['btn_delete'])) {
//     if (isset($_POST['chk_delete'])) {
//         foreach ($_POST['chk_delete'] as $value) {
//             // Ensure that the ID is properly escaped
//             $value = mysqli_real_escape_string($con, $value);

//             // Fetch the patient's record to log the deletion action
//             $result = mysqli_query($con, "SELECT * FROM tblpatient WHERE id = '$value'");
//             $patient = mysqli_fetch_assoc($result);

//             // Prepare log action details
//             $action = 'Deleted patient with ID: ' . $value . ', Name: ' . $patient['firstname'] . ' ' . $patient['lastname'] . ' ' . $patient['middlename'];
//             if (isset($_SESSION['role'])) {
//                 // Log the deletion action
//                 $log_query = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
//             }

//             // Delete the patient record
//             $delete_query = mysqli_query($con, "DELETE FROM tblpatient WHERE id = '$value'") or die('Error: ' . mysqli_error($con));

//             if ($delete_query) {
//                 $_SESSION['delete'] = 1;
//             } else {
//                 $_SESSION['delete_error'] = 1;
//             }
//         }

//         // Redirect to the current page to reflect changes
//         header("Location: " . $_SERVER['REQUEST_URI']);
//         exit();
//     }
// }


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
            $delete_query = mysqli_query($con, "DELETE FROM tblpatient WHERE id = $id") or die('Error: ' . mysqli_error($con));
        // }
        $_SESSION['delete'] = 1;
    // } else {
        // $_SESSION['delete'] = 0;
    // }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

?>
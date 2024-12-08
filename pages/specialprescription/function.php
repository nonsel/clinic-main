<?php

if(isset($_POST['btn_add'])){
    $txt_course = $_POST['txt_course'];

    if(isset($_SESSION['role'])){
        $action = 'Added Course with 
        Course : ' . $txt_course . '';
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['userid']."', NOW(), '".$action."')");
    }

    $query = mysqli_query($con,"INSERT INTO tblcourse (course) 
    VALUES ('$txt_course')") or die('Error: ' . mysqli_error($con));
    if($query == true)
    {
        $_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
    
}


if (isset($_POST['btn_save'])) {
    $txt_id = $_POST['hidden_id'];
    $txt_course = $_POST['txt_course'];

    if (isset($_SESSION['role'])) {
        $action = 'Edit Course with Course : ' . $txt_course;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) values ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
    }

    $update_query = mysqli_query($con, "UPDATE tblcourse SET 
        `course` = '".$txt_course."'
        WHERE `id` = '".$txt_id."'") or die('Error: ' . mysqli_error($con));

    if ($update_query) {
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    } else {
        echo 'Error updating record: ' . mysqli_error($con);
    }
}



if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            // Prevent SQL Injection
            $stmt = mysqli_prepare($con, "SELECT `course` FROM `tblcourse` WHERE `id` = ?");
            
            // Check if the statement was prepared successfully
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 's', $value);
                mysqli_stmt_execute($stmt);
                $record_query = mysqli_stmt_get_result($stmt);

                // Check if the record exists
                if ($record_query && mysqli_num_rows($record_query) > 0) {
                    $row = mysqli_fetch_array($record_query);
                    $course = $row['course'];

                    // Delete the record from tblcourse using prepared statement
                    $delete_stmt = mysqli_prepare($con, "DELETE FROM `tblcourse` WHERE `id` = ?");
                    if ($delete_stmt) {
                        mysqli_stmt_bind_param($delete_stmt, 's', $value);
                        $delete_result = mysqli_stmt_execute($delete_stmt);

                        if ($delete_result) {
                            $_SESSION['delete'] = 1;

                            $action = 'Delete Course with Course : ' . $course;
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
                    echo "Record not found or error fetching record: " . mysqli_error($con);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing select statement: " . mysqli_error($con);
            }
        }
    }
}



?>
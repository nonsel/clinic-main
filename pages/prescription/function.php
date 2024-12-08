<?php
if(isset($_POST['btn_add'])){
    $patient = $_POST['a_patient'];
    $date = date("Y-m-d");

    $refraction_od_sph = $_POST['a_refraction_od_sph'];
    $refraction_od_cyl = $_POST['a_refraction_od_cyl'];
    $refraction_od_axis = $_POST['a_refraction_od_axis'];
    $refraction_od_add = $_POST['a_refraction_od_add'];
    $refraction_od_prism_base = $_POST['a_refraction_od_prism_base'];
    $refraction_od_pd = $_POST['a_refraction_od_pd'];

    $refraction_os_sph = $_POST['a_refraction_os_sph'];
    $refraction_os_cyl = $_POST['a_refraction_os_cyl'];
    $refraction_os_axis = $_POST['a_refraction_os_axis'];
    $refraction_os_add = $_POST['a_refraction_os_add'];
    $refraction_os_prism_base = $_POST['a_refraction_os_prism_base'];
    $refraction_os_pd = $_POST['a_refraction_os_pd'];

    $spectacle_od_sph = $_POST['a_spectacle_od_sph'];
    $spectacle_od_cyl = $_POST['a_spectacle_od_cyl'];
    $spectacle_od_axis = $_POST['a_spectacle_od_axis'];
    $spectacle_od_add = $_POST['a_spectacle_od_add'];
    $spectacle_od_prism_base = $_POST['a_spectacle_od_prism_base'];
    $spectacle_od_pd = $_POST['a_spectacle_od_pd'];

    $spectacle_os_sph = $_POST['a_spectacle_os_sph'];
    $spectacle_os_cyl = $_POST['a_spectacle_os_cyl'];
    $spectacle_os_axis = $_POST['a_spectacle_os_axis'];
    $spectacle_os_add = $_POST['a_spectacle_os_add'];
    $spectacle_os_prism_base = $_POST['a_spectacle_os_prism_base'];
    $spectacle_os_pd = $_POST['a_spectacle_os_pd'];

    $contact_lens_od_sph = $_POST['a_contact_lens_od_sph'];
    $contact_lens_od_cyl = $_POST['a_contact_lens_od_cyl'];
    $contact_lens_od_axis = $_POST['a_ontact_lens_od_axis'];
    $contact_lens_od_add = $_POST['a_contact_lens_od_add'];
    $contact_lens_od_prism_base = $_POST['a_contact_lens_od_prism_base'];
    $contact_lens_od_pd = $_POST['a_contact_lens_od_pd'];

    $contact_lens_os_sph = $_POST['a_contact_lens_os_sph'];
    $contact_lens_os_cyl = $_POST['a_contact_lens_os_cyl'];
    $contact_lens_os_axis = $_POST['a_contact_lens_os_axis'];
    $contact_lens_os_add = $_POST['a_contact_lens_os_add'];
    $contact_lens_os_prism_base = $_POST['a_contact_lens_os_prism_base'];
    $contact_lens_os_pd = $_POST['a_contact_lens_os_pd'];

    $diagnosis = $_POST['a_diagnosis'];
    $frame_type = $_POST['a_frame_type'];

    if(isset($_SESSION['role'])){

        $res = mysqli_query($con,"INSERT INTO 
                                            tblprescription 
                                                    (
                                                        patient_id,
                                                        prescription_date,

                                                        refraction_od_sph,
                                                        refraction_od_cyl,
                                                        refraction_od_axis,
                                                        refraction_od_add,
                                                        refraction_od_prism_base,
                                                        refraction_od_pd,

                                                        refraction_os_sph,
                                                        refraction_os_cyl,
                                                        refraction_os_axis,
                                                        refraction_os_add,
                                                        refraction_os_prism_base,
                                                        refraction_os_pd,

                                                        spectacle_od_sph,
                                                        spectacle_od_cyl,
                                                        spectacle_od_axis,
                                                        spectacle_od_add,
                                                        spectacle_od_prism_base,
                                                        spectacle_od_pd,

                                                        spectacle_os_sph,
                                                        spectacle_os_cyl,
                                                        spectacle_os_axis,
                                                        spectacle_os_add,
                                                        spectacle_os_prism_base,
                                                        spectacle_os_pd,

                                                        contact_lens_od_sph,
                                                        contact_lens_od_cyl,
                                                        contact_lens_od_axis,
                                                        contact_lens_od_add,
                                                        contact_lens_od_prism_base,
                                                        contact_lens_od_pd,

                                                        contact_lens_os_sph,
                                                        contact_lens_os_cyl,
                                                        contact_lens_os_axis,
                                                        contact_lens_os_add,
                                                        contact_lens_os_prism_base,
                                                        contact_lens_os_pd,

                                                        diagnosis,
                                                        frame_type
                                                    ) 

                                            values (
                                                    '$patient',
                                                    '$date',
                                                    '$refraction_od_sph',
                                                    '$refraction_od_cyl',
                                                    '$refraction_od_axis',
                                                    '$refraction_od_add',
                                                    '$refraction_od_prism_base',
                                                    '$refraction_od_pd',

                                                    '$refraction_os_sph',
                                                    '$refraction_os_cyl',
                                                    '$refraction_os_axis',
                                                    '$refraction_os_add',
                                                    '$refraction_os_prism_base',
                                                    '$refraction_os_pd',

                                                    '$spectacle_od_sph',
                                                    '$spectacle_od_cyl',
                                                    '$spectacle_od_axis',
                                                    '$spectacle_od_add',
                                                    '$spectacle_od_prism_base',
                                                    '$spectacle_od_pd',

                                                    '$spectacle_os_sph',
                                                    '$spectacle_os_cyl',
                                                    '$spectacle_os_axis',
                                                    '$spectacle_os_add',
                                                    '$spectacle_os_prism_base',
                                                    '$spectacle_os_pd',

                                                    '$contact_lens_od_sph',
                                                    '$contact_lens_od_cyl',
                                                    '$contact_lens_od_axis',
                                                    '$contact_lens_od_add',
                                                    '$contact_lens_od_prism_base',
                                                    '$contact_lens_od_pd',

                                                    '$contact_lens_os_sph',
                                                    '$contact_lens_os_cyl',
                                                    '$contact_lens_os_axis',
                                                    '$contact_lens_os_add',
                                                    '$contact_lens_os_prism_base',
                                                    '$contact_lens_os_pd',

                                                    '$diagnosis',
                                                    '$frame_type')"); 

        $action = 'Added Prescription ID: '.$res['last_inset_id'];
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['userid']."', NOW(), '".$action."')");
    }

    $_SESSION['added'] = 1;
    header ("location: ".$_SERVER['REQUEST_URI']);

    
}


if (isset($_POST['btn_save'])) {


    $update_query = mysqli_query($con, "UPDATE 
                                            tblcourse SET 
                                                `patient` = ''
        WHERE `id` = '".$txt_id."'") or die('Error: ' . mysqli_error($con));


    header("location: ".$_SERVER['REQUEST_URI']);

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
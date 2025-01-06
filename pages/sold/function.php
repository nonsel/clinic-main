<?php
if(isset($_POST['btn_add'])){
    $txt_description = $_POST['txt_description'];

    if(isset($_SESSION['role'])){
        $action = 'Added Office with name of '.$txt_description;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['userid']."', NOW(), '".$action."')");
    }

    $su = mysqli_query($con,"SELECT * from tbloffice where office = '".$txt_description."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){
        $query = mysqli_query($con,"INSERT INTO tbloffice (office) 
            values ('$txt_description')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        } 
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}


if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_description = $_POST['txt_description'];

    $existing_record_query = mysqli_query($con, "SELECT office FROM tbloffice WHERE id = '$txt_id'");
    $row = mysqli_fetch_array($existing_record_query);
    
    $office = $row['office'];

    if (isset($_SESSION['role'])) {
        $action = 'Edited Office with with name of  ' . $txt_description . '
         And Office with From Office: ' . $office . '';
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) values ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
    }

    $update_query = mysqli_query($con,"UPDATE tbloffice set office = '".$txt_description."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}


if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            // Retrieve the record before deletion
            $record_query = mysqli_query($con, "SELECT office FROM tbloffice WHERE id = '$value'");
            $row = mysqli_fetch_array($record_query);
            $office = $row['office'];

            // Delete the record
            $delete_query = mysqli_query($con, "DELETE FROM tbloffice WHERE id = '$value'") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                
                $action = 'Deleted Office with : ' . $office . '';
                $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['userid'] . "', NOW(), '" . $action . "')");
            }
        }
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}


?>
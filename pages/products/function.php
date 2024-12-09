<?php

if(isset($_POST['btn_add'])){

    $name= $_POST['a_name'];
    $category= $_POST['a_category'];
    $date_ordered = date("Y-m-d");
    $model_number = $_POST['a_model_number'];
    // $frame_brand = $_POST['a_frame_brand'];
    $frame_type = $_POST['a_frame_type'];
    // $lens_type = $_POST['a_lens_type'];
    $lens_coating = $_POST['a_lens_coating'];
    $sph = $_POST['a_sph'];
    $add = $_POST['a_add'];
    $supplier = $_POST['a_supplier'];
    $price = $_POST['a_price'];
    $qty = $_POST['a_qty'];


    if(isset($_SESSION['role'])){
        $action = 'Added Product Category: '.$category;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    // $su = mysqli_query($con,"SELECT * from tblproduct where model_number = '".$model_number."' ");
    // $ct = mysqli_num_rows($su);
    
    // if($ct == 0){

       $query = mysqli_query($con,"INSERT INTO tblproduct (
                                                            name,
                                                            cat_id,
                                                            date_created,
                                                            model_number,
                                                            frame_type,
                                                            lens_coating,
                                                            sph,
                                                            i_add,
                                                            supplier_id,
                                                            price,
                                                            qty
                                                           ) 
                                            values (
                                                            '$name',
                                                            '$category',
                                                            '$date_ordered',
                                                            '$model_number',
                                                            '$frame_type', 
                                                            '$lens_coating',
                                                            '$sph',
                                                            '$add',
                                                            '$supplier',
                                                            '$price',
                                                            '$qty'
                                                    )") or die('Error: ' . mysqli_error($con));
    // }
    // else{
    //     $_SESSION['duplicateuser'] = 1;
    //     header ("location: ".$_SERVER['REQUEST_URI']);
    // }    

    header ("location: ".$_SERVER['REQUEST_URI']);

}




if (isset($_POST['btn_save'])) {

    $txt_id = $_POST['hidden_id'];
    $name= $_POST['i_name'];
    $category= $_POST['i_category'];
    $date_updated = date("Y-m-d");
    $model_number = $_POST['i_model_number'];
    // $frame_brand = $_POST['i_frame_brand'];
    $frame_type = $_POST['i_frame_type'];
    // $lens_type = $_POST['i_lens_type'];
    $lens_coating = $_POST['i_lens_coating'];
    $sph = $_POST['i_sph'];
    $add = $_POST['i_add'];
    $supplier = $_POST['i_supplier'];
    $price = $_POST['i_price'];
    $qty = $_POST['i_qty'];

    // Check if the user is logged in and log the action
    if (isset($_SESSION['role'])) {
        $action = 'Added Category: ' . $category;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }
    
    $query = mysqli_query($con, "UPDATE 
                                    tblproduct 
                                SET 
                                    name='$name',
                                    cat_id='$category',
                                    date_updated='$date_updated',
                                    model_number='$model_number',
                                    frame_type='$frame_type',
                                    lens_coating='$lens_coating',
                                    sph='$sph',
                                    i_add='$add',
                                    supplier_id='$supplier',
                                    price='$price',
                                    qty='$qty'
                                WHERE 
                                    id = '$txt_id'") or die('Error: ' . mysqli_error($con));
    if ($query) {
        // Handle successful update
        $_SESSION['updated'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        // Handle query execution failure
        $_SESSION['update_failure'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}


if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblproduct where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

if (isset($_POST['btn_delete'])) {
    $txt_id = $_POST['id'];

    // Validate $txt_id as a numeric value
    if (is_numeric($txt_id)) {
        // Use prepared statements to update the status to "ARCHIVED"
        $stmt = mysqli_prepare($con, "UPDATE tblproduct SET status = 'ARCHIVED' WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $txt_id); // "i" stands for integer
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            $_SESSION['archived'] = 1;
        } else {
            // Handle update error, e.g., log the error message
            echo "Error archiving customer with ID: $txt_id";
        }

        mysqli_stmt_close($stmt);
    }

    // Redirect or display success message as needed
    header("location: ".$_SERVER['REQUEST_URI']);
}

?>
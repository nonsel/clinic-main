<?php

if(isset($_POST['btn_add'])){

    $name= $_POST['a_name'];
    $code = $_POST['a_code'];
    $category = $_POST['a_category'];

    if($category==1){
        $lens_type = $_POST['a_lens_type'];
        $lens_coating = $_POST['a_lens_coating'];
        $prescription = $_POST['a_prescription'];
    }else{
        $date_ordered = $_POST['a_date_ordered'];
        $frame_brand = $_POST['a_frame_brand'];
        $frame_type = $_POST['a_frame_type'];
    }

    $supplier = $_POST['a_supplier'];
    $price = $_POST['a_price'];
    $qty = $_POST['a_qty'];
    $date_created = date("Y-m-d");


    if(isset($_SESSION['role'])){
        $action = 'Added Product Category: '.$category;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $sql = "";
    if($category==1){

        $sql = "INSERT INTO tblproduct (
                                        name,
                                        code,
                                        cat_id,
                                        lens_type,
                                        lens_coating,
                                        prescription,
                                        supplier_id,
                                        price,
                                        qty,
                                        date_created
                                       ) 
                                values (
                                        '$name',
                                        '$code',
                                        '$category',
                                        '$lens_type',
                                        '$lens_coating',
                                        '$prescription',
                                        '$supplier',
                                        '$price',
                                        '$qty',
                                        '$date_created')";
    }else{


        $sql = "INSERT INTO tblproduct (
                                        name,
                                        code,
                                        cat_id,
                                        date_ordered,
                                        frame_brand,
                                        frame_type,
                                        supplier_id,
                                        price,
                                        qty,
                                        date_created
                                       ) 
                                values (
                                        '$name',
                                        '$code',
                                        '$category',
                                        '$date_ordered',
                                        '$frame_brand',
                                        '$frame_type',
                                        '$supplier',
                                        '$price',
                                        '$qty',
                                        '$date_created'
                                        )";

    }


    $query = mysqli_query($con,$sql) or die('Error: ' . mysqli_error($con));


    header ("location: ".$_SERVER['REQUEST_URI']);

}

// if(isset($_POST['btn_delete']))
// {
//     if(isset($_POST['chk_delete']))
//     {
//         foreach($_POST['chk_delete'] as $value)
//         {
//             $delete_query = mysqli_query($con,"DELETE from tblproduct where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
//             if($delete_query == true)
//             {
//                 $_SESSION['delete'] = 1;
//                 header("location: ".$_SERVER['REQUEST_URI']);
//             }
//         }
//     }
// }

// if (isset($_POST['btn_delete'])) {
//     $txt_id = $_POST['id'];

//     // Validate $txt_id as a numeric value
//     if (is_numeric($txt_id)) {
//         // Use prepared statements to update the status to "ARCHIVED"
//         $stmt = mysqli_prepare($con, "UPDATE tblproduct SET status = 'ARCHIVED' WHERE id = ?");
//         mysqli_stmt_bind_param($stmt, "i", $txt_id); // "i" stands for integer
//         $success = mysqli_stmt_execute($stmt);

//         if ($success) {
//             $_SESSION['archived'] = 1;
//         } else {
//             // Handle update error, e.g., log the error message
//             echo "Error archiving customer with ID: $txt_id";
//         }

//         mysqli_stmt_close($stmt);
//     }

//     // Redirect or display success message as needed
//     header("location: ".$_SERVER['REQUEST_URI']);
// }

?>
<?php
if(isset($_POST['btn_add'])){
    $txt_name = $_POST['txt_name'];

    $su = mysqli_query($con,"SELECT * from tblcategory where category = '".$txt_uname."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){
        $query = mysqli_query($con,"INSERT INTO tblcategory (category) 
            values ('$txt_name')") or die('Error: ' . mysqli_error($con));
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
    $txt_edit_name = $_POST['txt_edit_name'];

    $su = mysqli_query($con,"SELECT * from tblcategory where category = '".$txt_edit_uname."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){
        $update_query = mysqli_query($con,"UPDATE tblcategory set category = '".$txt_edit_name."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

        if($update_query == true){
            $_SESSION['edited'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}


if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            // Check if $value is numeric before using it in the query
            if(is_numeric($value)) {
                $delete_query = mysqli_query($con,"DELETE from tblcategory where id = '$value' ") or die('Error: ' . mysqli_error($con));
                
                if($delete_query == true)
                {
                    $_SESSION['delete'] = 1;
                    header("location: ".$_SERVER['REQUEST_URI']);
                }
            }
        }
    }
}

?>
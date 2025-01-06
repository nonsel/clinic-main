<?php
if (isset($_POST['btn_add'])) {
    $txt_name = $_POST['txt_name'];
    $txt_uname = $_POST['txt_uname'];
    $txt_pass = $_POST['txt_pass'];

    if (isset($_SESSION['role'])) {
        $action = 'Added Teacher with name of ' . $txt_name;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");

        $iquery = mysqli_query($con, "INSERT INTO tbluser 
                                                    (
                                                        name,
                                                        username,
                                                        password,
                                                        role,
                                                        active,
                                                        photo
                                                     ) 
                                              values (
                                                        '$txt_name',
                                                        '$txt_uname',
                                                        '$txt_pass',
                                                        'ADMINISTRATOR',
                                                        'ACTIVE',
                                                        ''
                                                     )");
    }

    header("location: " . $_SERVER['REQUEST_URI']);

    // $ct = mysqli_num_rows($su);


}


if (isset($_POST['btn_save'])) {
    $txt_id = $_POST['hidden_id'];
    $txt_edit_name = $_POST['txt_edit_name'];
    $txt_edit_uname = $_POST['txt_edit_uname'];
    $txt_edit_pass = $_POST['txt_edit_pass'];

    if (isset($_SESSION['role'])) {
        $action = 'Update Teacher with name of ' . $txt_edit_name;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");

        $query = mysqli_query($con, "UPDATE 
                                    tbluser 
                                SET 
                                    name='$txt_edit_name',
                                    username='$txt_edit_uname',
                                    password='$txt_edit_pass',
                                    role='ADMINISTRATOR',
                                    active='ACTIVE',
                                    photo=''
                                WHERE 
                                    id = '$txt_id'") or die('Error: ' . mysqli_error($con));
    }

    // $ct = mysqli_num_rows($su);
    header("location: " . $_SERVER['REQUEST_URI']);

}

if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            $delete_query = mysqli_query($con, "DELETE from tbluser where id = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>
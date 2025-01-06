<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
    exit();
} else {
    ob_start();
    include('../head_css.php'); ?>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Patient Record</h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="box">
                            <div class="box-header">
                                <div style="padding:10px;">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i
                                            class="fa fa-user-plus" aria-hidden="true"></i> Add Patient</button>
                           <!--          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button> -->
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <form method="post"> <!-- Update with your actual PHP script for deleting records -->
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox"
                                                        name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" />
                                                </th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Middlename</th>
                                                <th>Phone No</th>
                                                <th>Suffix</th>
                                                <th style="width: 40px !important;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT * FROM tblpatient WHERE is_delete = 0 ORDER BY id DESC");
                                            while ($row = mysqli_fetch_array($squery)) {
                                                echo '
                                                    <tr>
                                                        <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['id'] . '" /></td>
                                                        <td>' . $row['firstname'] . '</td>
                                                        <td>' . $row['lastname'] . '</td>
                                                        <td>' . $row['middlename'] . '</td>
                                                        <td>' . $row['phoneno'] . '</td>
                                                        <td>' . $row['suffix'] . '</td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm" data-target="#editModal' . $row['id'] . '" data-toggle="modal">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                            </button>
                                                            <div class="space">&nbsp;</div>
                                                            <button class="btn btn-info btn-sm btn-view" data-target="#viewModal' . $row['id'] . '" data-toggle="modal"
                                                                id="'.$row['id'].'">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    ';

                                                include "edit_modal.php";
                                                include "view_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->


                        <div id="modal-archive" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Archvied Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to archived selected data below?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
                                    <input type="submit" class="btn btn-primary btn-sm" name="btn_archived" value="Yes"/>
                                </div>
                            </div>
                          </div>
                        </div>

                        <?php include "../edit_notif.php"; ?>
                        <?php include "../added_notif.php"; ?>
                        <?php include "../delete_notif.php"; ?>
                        <?php include "../duplicate_error.php"; ?>
                        <?php include "add_modal.php"; ?>
                        <?php include "function.php"; ?>

                    </div> <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
    <?php }
include "../footer.php"; ?>
    <script type="text/javascript">
        $(function () {
            $("#table").dataTable({
                "aoColumnDefs": [{ "bSortable": false, "aTargets": [0, 6] }], "aaSorting": []
            });


            let edit_id;
            $(".btn-delete-from-view").click(function(){
                edit_id = $(this).attr("id");
                $("#modal-archive").modal("show");
            });

            $("[name=btn_archived]").click(function(){

                $.ajax({
                        url: "additional_function.php",
                        type: "POST",
                        data: {id:edit_id, btn_delete:"1"},
                        success: function(response){
                            $("#modal-archive").modal("hide");
                            location.reload();
                        }
                });

            });


        });
    </script>
</body>

</html>
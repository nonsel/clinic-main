<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
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
                    <h1>
                        Supplier Record
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-industry" aria-hidden="true"></i> Add Supplier</button>  
  <!--                                       <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>  -->
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
   
                                                <th>Supplier Name</th>
                                                <th>Contact No</th>
                                                <th>Address</th>
                                                <th style="width: 40px !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT * FROM tblsupplier WHERE is_delete = 0 ORDER BY id DESC ");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" />
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['contact_number'].'</td>
                                                    <td>'.$row['address'].'</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                        <div class="space">&nbsp;</div>
                                                        <button class="btn btn-info btn-sm btn-view" data-toggle="modal" id="'.$row['id'].'">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button>
                                                </tr>
                                                ';

                                                include "edit_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php //include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

                            <?php include "add_modal.php"; ?>

                            <?php include "view_modal.php"; ?>

                            <?php include "function.php"; ?>


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


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,3 ] } ],"aaSorting": []
        });

        let edit_id;
        $(".btn-view").click(function(){
            edit_id = $(this).attr("id");

            $.ajax({
                url: "function_additional.php",
                type: "POST",
                data: {get_supplier:1,id:edit_id},
                dataType: 'json',
                success: function(response){

                    a = response[0];
                    let form = $("#viewModal");
                    for(x in a){
                        form.find(`[name="v_${x}"]`).val(a[x]);

                    }

                     $("#viewModal").modal("show");

                },
                error: function(){

                }
            });//END :: AJAX
            
        });

        $("#btn_delete").click(function(){
            $("#modal-archive").modal("show");
        });

        $("[name=btn_archived]").click(function(){

            let id = $(this).attr("id");

            $.ajax({
                url: "function_additional.php",
                type: "POST",
                data: {id:edit_id, btn_delete:"1"},
                success: function(response){
                    $("#modal-archive").modal("hide");
                    location.reload();
                }
            });//END :: AJAX

        })



    });
</script>
    </body>
</html>
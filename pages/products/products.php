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
                        Product Record
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                <div class="row" style="padding: 10px;">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Products Offer</button>  
                                    </div>
                                    <div class="col-md-6 text-right">

                                    </div>
                                </div>
                                    <div style="padding:10px;">
                                        
                                              </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Category</th>
                                                <th>Lens Type</th>
                                                <th>Lens Coating</th>
                                                <th>Prescription</th>
                                                <th>Frame Brand</th>
                                                <th>Frame Type</th>
                                                <th>Qunatity</th>
                                                <th>Price</th>
                                                <th style="width: 40px !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $squery = mysqli_query($con, "SELECT 
                                                                                p.*
                                                                        FROM 
                                                                            tblproduct p
                                                                        WHERE 
                                                                            is_delete = 0
                                                                        ORDER BY
                                                                            id DESC
                                                                        ");
                                           while($row = mysqli_fetch_array($squery))
                                            {
    
                                                $sel_lens="";
                                                $sel_frame="";
                                                $sel_access="";
                                                if($row['cat_id']==1){
                                                    $sel_lens = "selected";
                                                    $category = "Lens";
                                                }elseif($row['cat_id']==2){
                                                    $sel_frame="selected";
                                                    $category = "Frame";
                                                }else{
                                                    $sel_access="selected";
                                                    $category = "Accessories";
                                                }
                                                echo '
                                                <tr>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['code'].'</td>
                                                    <td>'.$category.'</td>
                                                    <td>'.$row['lens_type'].'</td>
                                                    <td>'.$row['lens_coating'].'</td>
                                                    <td>'.$row['prescription'].'</td>
                                                    <td>'.$row['frame_brand'].'</td>
                                                    <td>'.$row['frame_type'].'</td>
                                                    <td>'.$row['qty'].'</td>
                                                    <td>'.$row['price'].'</td>
                                                    <td class="d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-sm btn-edit" data-toggle="modal" id="'.$row['id'].'">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                        <div class="space">&nbsp;</div>
                                                        <button href="#" data-toggle="modal" class="btn btn-info btn-sm btn-view" id="'.$row['id'].'">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button> 
                                                    </td>
                                                    </tr>
                                                ';

                                                include "archived_modal.php";
                                                
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php 
                                        // include "../deleteModal.php";
                                        include "view_modal.php";
                                        include "edit_modal.php";
                                    ?>


                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php //include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

                            <?php include "add_modal.php"; ?>

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

            $(document).ready(function() {

                $("#table").dataTable({
                   "aoColumnDefs": [ 
                    { 
                        "bSortable": false, "aTargets": [ 0,3 ] } 
                    ],
                    "aaSorting": []
                });


                let edit_id;
                $(".btn-edit").click(function(){
                    edit_id = $(this).attr("id");

                    $.ajax({
                        url: "function_additional.php",
                        type: "POST",
                        data: {get_product:1,id:edit_id},
                        dataType: 'json',
                        success: function(response){

                            a = response[0];
                            let cat_id = 1;
                            let form = $("#form-edit");
                            for(x in a){
                                form.find(`[name="${x}"]`).val(a[x]);
                                if(x=="cat_id"){
                                    form.find(`[name="${x}"]`).change();
                                }
                            }


                            $("#editModal").modal("show");

                        },
                        error: function(){

                        }
                    });//END :: AJAX


                });



                $("#form-edit").submit(function(e){
                    e.preventDefault();

                    var form = $(this);

                    $.ajax({
                        url: "function_additional.php",
                        type: "POST",
                        data: form.serialize()+"&update=1",
                        success: function(response){
                            location.reload();
                        },
                        error: function(){

                        }
                    });//END :: AJAX


                })



                $(".btn-view").click(function(){
                    edit_id = $(this).attr("id");


                    $.ajax({
                        url: "function_additional.php",
                        type: "POST",
                        data: {get_product:1,id:edit_id},
                        dataType: 'json',
                        success: function(response){

                            a = response[0];
                            let form = $("#viewModal");
                            for(x in a){
                                form.find(`[name="${x}"]`).val(a[x]);
                                if(x=="cat_id"){
                                    form.find(`[name="${x}"]`).change();
                                }
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
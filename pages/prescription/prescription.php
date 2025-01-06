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
                    <h1>Prescriptions Record</h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="box">
                            <div class="box-header">
                                <div style="padding:10px;">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i
                                            class="fa fa-user-plus" aria-hidden="true"></i> Add Prescriptions</button>
                                </div>
                            </div><!-- /.box-header -->

                            <table id="table" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <!-- <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th> -->
                                                <th>Prescription ID</th>
                                                <th>Name</th>
                                                <th>Prescription Date</th>
                                                <th>Daignosis</th>
                                                <th>Frame Type</th>
                                                <th style="width: 40px !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = $con->query("SELECT 
                                                                            pres.*,
                                                                            (SELECT CONCAT(firstname,' ',lastname) FROM tblpatient p WHERE p.id = pres.patient_id ) as full_name
                                                                       FROM 
                                                                            tblprescription pres
                                                                       WHERE
                                                                            is_delete=0
                                                                        ORDER BY
                                                                            id DESC");


                                                
                                                if ($result->num_rows > 0) {
                                                  // output data of each row
                                                  while($row = $result->fetch_assoc()) {

                                                        $frame_type="Rimless";
                                                        if($row["frame_type"]==1){
                                                            $frame_type="Full Rim";
                                                        }elseif($row["frame_type"]==2){
                                                            $frame_type="Semi Rim";
                                                        }

                                                        $table = "";
                                                        $table .="<tr>";
                                                            // $table .="<td><input type='checkbox' name='chk_delete[]' class='chk_delete' value='".$row['id']."'/></td>";
                                                            $table .="<td> PX-00".$row["id"]."</td>";
                                                            $table .="<td>".$row["full_name"]."</td>";
                                                            $table .="<td>".$row["prescription_date"]."</td>";
                                                            $table .="<td>".$row["diagnosis"]."</td>";
                                                            $table .="<td>".$frame_type."</td>";
                                                            $table .= "<td class='d-flex justify-content-between'>
                                                                          <button class='btn btn-primary btn-sm btn-edit' id='".$row['id']."'>
                                                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit
                                                                          </button>
                                                                          <div class='space'>&nbsp;</div>
                                                                          <button class='btn btn-info btn-sm btn-view' data-toggle='modal' id='".$row['id']."'>
                                                                                <i class='fa fa-eye' aria-hidden='true'></i> View
                                                                          </button> 
                                                                    </td>";
                                                        echo $table .="</tr>";

                                                  }
                                                } else {
                                                  echo "0 results";
                                                }


                                            ?>
                                        </tbody>

                            </table>

                        </div><!-- /.box -->




                        <?php include "../edit_notif.php"; ?>
                        <?php include "../added_notif.php"; ?>
                        <?php include "../delete_notif.php"; ?>
                        <?php include "../duplicate_error.php"; ?>
                        <?php include "add_modal.php"; ?>
                        <?php include "view_modal.php"; ?>
                        <?php include "edit_modal.php"; ?>
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
                "aoColumnDefs": [{ "bSortable": false, "aTargets": [0, 5] }], "aaSorting": []
            });


        });

        $(".btn-edit").click(function(){
            let id = $(this).attr("id");

            $.ajax({
                url: "function_additional.php",
                type: "POST",
                data: {get_prescription:1,id:id},
                dataType: 'json',
                success: function(response){

                    a = response[0];
                    let form = $("#form-edit");
                    for(x in a){
                        form.find(`[name="${x}"]`).val(a[x]).change();

                    }

                     $("#editModal").modal("show");

                },
                error: function(){

                }
            });//END :: AJAX
            
        });


        let edit_id;
        $(".btn-view").click(function(){
            edit_id = $(this).attr("id");

            $.ajax({
                url: "function_additional.php",
                type: "POST",
                data: {get_prescription:1,id:edit_id},
                dataType: 'json',
                success: function(response){

                    a = response[0];
                    let form = $("#viewModal");
                    for(x in a){
                        form.find(`[name="${x}"]`).val(a[x]).change();
                    }

                     $("#viewModal").modal("show");

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


        
        $("#btn_delete").click(function(){
            $("#modal-archive").modal("show");
        });

        $("[name=btn_archived]").click(function(){

            $.ajax({
                    url: "function_additional.php",
                    type: "POST",
                    data: {delete:1,id:edit_id},
                    success: function(response){
                        $("#modal-archive").modal("hide");
                        location.reload();

                    },
                    error: function(){

                    }
            });//END :: AJAX

        });

        $(".select2").select2({
          placeholder: "Select Patient",
          allowClear: true
        });

        
    </script>
</body>

</html>
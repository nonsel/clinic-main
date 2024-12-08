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
                       VIEW CHECKED-OUT RECORD
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Transaction No</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $transno = isset($_GET['transno']) ? $_GET['transno'] : '';
                                            $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
                                            $squery = mysqli_query($con, "SELECT o.id, o.product_id, o.quantity, (o.quantity * p.price) AS subtotal, o.user_id, o.transno, o.date_created, p.name, p.price, p.image, p.description, p.cat_id FROM tblorder as o INNER JOIN tblproduct as p ON p.id=o.product_id where o.transno = '$transno' AND o.user_id= '$user_id' ORDER BY id asc");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row['transno'].'</td>
                                                    <td>' . $row['name'] . '</td>
                                                    <td>' . $row['price'] . '</td>
                                                    <td>' . $row['quantity'] . '</td>
                                                    <td>' . $row['subtotal'] . '</td>
                                                    <td style="width:70px;"><image src="../../assets/img/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                  </tr>
                                                ';

                                                // include "edit_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

            <?php include "add_modal.php"; ?>

            <?php include "function.php"; ?>


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
    });
</script>
    </body>
</html>
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

    <style>
    /* Custom CSS for spacing */
    .custom-card {
        margin-bottom: 20px; /* Adjust the margin as needed */
    }
    </style>
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
                        CREATE ORDER : 
                    </h1>   
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                            <div class="box-header">
                              <div style="padding:10px;">
                              <div class="col-md-10 col-sm-7 col-xs-12"><br>
                                    <div class="info-box">
                                        <form method="POST">
                                            <div class="form-group row">
                                                <?php
                                                $user = mysqli_query($con,"SELECT * from tbluser where id = '".$_SESSION['userid']."' ");
                                                while($row = mysqli_fetch_array($user)){
                                                    echo '<input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>';
                                                }
                                                ?>
                                                <div class="form-group col-md-6">
                                                    <label for="category">Category Type:</label>
                                                    <select name="category" class="form-control input-sm select2" style="width:100%" onchange="this.form.submit()">
                                                        <option disabled selected>-- Select Category Type --</option>
                                                        <?php
                                                        // Output Category Type options from PHP
                                                        $qc = mysqli_query($con, "SELECT c.id,c.category,p.id as product_id,p.name,p.price,p.qty,p.status,p.description,p.image,p.cat_id FROM tblcategory as c INNER JOIN tblproduct as p ON p.cat_id=c.id");
                                                        while ($rowc = mysqli_fetch_array($qc)) {
                                                            echo '<option value="' . $rowc['id'] . '">' . $rowc['category'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>


                                            <div class="form-group row">
                                                <label for="txt_quantity" class="col-sm-2 col-form-label">Quantity:</label>
                                                <div class="col-sm-4">
                                                    <input name="txt_quantity" id="txt_quantity" class="form-control input-sm" type="text" placeholder="Quantity">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Item">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>                                
                            </div><!-- /.box-header -->
                               
                    
                            </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $user = mysqli_query($con, "SELECT * FROM tbluser WHERE id = '" . $_SESSION['userid'] . "'");
                                            $squery = mysqli_query($con, "SELECT
                                                o.id,
                                                o.product_id,
                                                o.quantity,
                                                (o.quantity * p.price) AS subtotal,
                                                o.date_created,
                                                o.user_id,
                                                p.name,
                                                p.price,
                                                p.image,
                                                p.description,
                                                p.status,
                                                u.name AS user_name
                                            FROM tblorder AS o
                                            INNER JOIN tblproduct AS p ON p.id = o.product_id
                                            INNER JOIN tbluser AS u ON u.id = o.user_id
                                            WHERE o.user_id = '" . $_SESSION['userid'] . "' AND transno='NULL'");
                                            
                                            while ($row = mysqli_fetch_array($squery)) {
                                                echo '
                                                <tr>
                                                    <td>' . $row['name'] . '</td>
                                                    <td style="width:70px;"><image src="../../../assets/img/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                    <td>' . $row['price'] . '</td>
                                                    <td>' . $row['quantity'] . '</td>
                                                    <td>' . $row['subtotal'] . '</td>
                                                    <td><button class="btn btn-danger btn-sm" data-target="#deleteModal' . $row['id'] . '" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i> Remove</button></td>
                                                </tr>
                                                ';
                                            }
                                            ?>


                                        </tbody>
                                    </table>

                                   

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <div class="box-header">
                              <div style="padding:10px;">
                                <div class="col-md-10 col-sm-7 col-xs-12"><br>
                                    <div class="info-box">

                                        <div class="form-group row">
                                            <label for="txt_quantity" class="col-sm-2 col-form-label">Enter Customer Name:</label>
                                            <div class="col-sm-4">
                                                <input name="txt_quantity" id="txt_quantity" class="form-control input-sm" type="text" placeholder="Customer Name">
                                            </div>
                                            <label for="txt_quantity" class="col-sm-2 col-form-label">Total:</label>
                                            <div class="col-sm-4">
                                                <input name="txt_total" id="txt_total" class="form-control input-sm" type="text" placeholder="Total" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addModal">
                                                    Proceed to place order
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              
                              </div>                                
                            </div><!-- /.box-header -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

       

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
                                       
    document.getElementById('category').addEventListener('change', function () {
    // Get the selected Category Type ID
    var selectedCategoryId = this.value;

    // Filter and update the Product Type dropdown based on the selected Category Type
    var productDropdown = document.getElementById('productType');
    var productOptions = productDropdown.querySelectorAll('.product-type-option');

    productOptions.forEach(function (option) {
        var categoryID = option.getAttribute('data-category-id');
        if (selectedCategoryId === categoryID || selectedCategoryId === '') {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });

    // Reset the Product Type dropdown to its initial state
    productDropdown.value = '';
});
</script>
    </body>
</html>
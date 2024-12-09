<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
} else {
    ob_start();
    include('../head_css.php');
?>
<style>
      /* Custom design for the submit button */
      input[type="submit"] {
        background-color: #3498db; /* Kulay ng background */
        color: #fff; /* Kulay ng text */
        padding: 8px 15px; /* Lapad at taas ng button padding */
        border: none; /* Walang border */
        cursor: pointer; /* Icon ng cursor kapag nasa button */
        border-radius: 5px; /* Radius ng border */
        font-size: 14px; /* Laki ng text */
        text-transform: uppercase; /* Convert text to uppercase */
        transition: background-color 0.3s; /* Transition ng kulay kapag hover */
    }

    /* Kapag nag-hover ang mouse sa button */
    input[type="submit"]:hover {
        background-color: #2980b9; /* Bagong kulay ng background kapag hover */
    }
    .category-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Center the buttons horizontally */
        gap: 10px;
    }

    .btn-category {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        text-transform: uppercase; /* Convert text to uppercase */
        transition: background-color 0.3s;
    }

    .btn-category:hover {
        background-color: #2980b9;
    }

    .container {
        margin-right: auto; /* Ilagay ang margin sa right side para i-center ang content sa kaliwa */
        margin-left: 0; /* Ilagay ang margin sa left side para i-center ang content sa kaliwa */
    }

    .custom-card {
        margin: 10px; /* Margin between each card */
        padding: 5px; /* Padding inside each card */
        text-align: center; /* Center-align the content */
    }
    .custom-scrollable {
        overflow-y: auto;
        max-height: 700px; /* Adjust the max-height as needed */
        max-width: 750px;
    }
    .custom-box {
        max-width: 100%; /* Adjust the max-width as needed */
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
        <section class="content-header">
                <h1>
                    <i class="fa fa-shopping-cart"></i> SALES
                </h1>
                
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- left column -->
                <div class="box">
                    <div class="box-header">
                        <div style="padding:10px;">
                            <div class="form-group col-md-6">
                                <label for="category">Category Type:</label>
                                <form method="post">
                                    <select name="category" class="form-control input-sm select2" style="width:100">
                                        <option value="*" selected>-- All Categories --</option>
                                        <option value="1">Lens</option>
                                        <option value="2">Frame</option>
                                        <option value="3">Accessories</option>
                                    </select>
                                    <br>
                                    <input type="submit" name="submit" value="Search" />
                                </form>
                            </div>
                        </div>                                
                    </div><!-- /.box-header -->
                </div>

                
       <!-- Table -->
        <div class="col-md-12">
            <div class="box custom-box">
                <div class="box-header">
                    <div class="box" style="overflow-y: auto; max-height: 300px; max-width: 1700px;">
                        <div class="box-header">
                            <?php
                            if (isset($_POST['category'])) {
                                $selectedCategoryId = $_POST['category'];
                                if ($selectedCategoryId == '*') {
                                    // Lahat ng kategorya
                                    $productsQuery = mysqli_query($con, "SELECT * FROM tblproduct WHERE status='ACTIVE'");
                                } else {
                                    // Isang kategorya lamang
                                    $productsQuery = mysqli_query($con, "SELECT * FROM tblproduct WHERE cat_id = $selectedCategoryId AND status='ACTIVE'");
                                }
                                
                                while ($row = mysqli_fetch_array($productsQuery)) {
                                    echo '<div class="col-md-1 col-sm-10 col-xs-12 custom-card">';
                                    echo '<div class="info-box"><br><div class="col-md-10 col-sm-8 col-xs-12">';
                                    echo '<center><div class="card mb-3">';
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title">' . $row['name'] . ' ₱ ' . $row['price'] . '</h5>';
                                    echo '<button class="btn btn-primary btn-sm book-now-button"';
                                    echo 'data-toggle="modal" data-target="#quantityModal"';
                                    echo 'data-product-id="' . $row['id'] . '"';
                                    echo 'data-product-price="' . $row['price'] . '"';
                                    echo 'data-product-description="' . $row['description'] . '"';
                                    echo 'data-product-image="../../assets/img/' . $row['image'] . '">';
                                    echo '<i class="fa fa-file-o" aria-hidden="true"></i> Add Item</button>';
                                    echo '</div></div></center></div></div></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="box custom-box">
                        <div class="box-header">
                            <div class="box-body table-responsive" style="height: 320px; overflow-y: auto;">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub-Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user = mysqli_query($con, "SELECT * FROM tbluser WHERE id = '" . $_SESSION['userid'] . "'");
                                            $order_id = "";
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
                                            WHERE o.user_id = '" . $_SESSION['userid'] . "' AND transno IS NULL");
                                            
                                            while ($row = mysqli_fetch_array($squery)) {
                                                $order_id = $row['id'];
                                                echo '
                                                <tr>
                                                    <td>' . $row['name'] . '</td>
                                                    <td>' . $row['price'] . '</td>
                                                    <td>' . $row['quantity'] . '</td>
                                                    <td>' . $row['subtotal'] . '</td>
                                                    
                                                    <td><button class="btn btn-danger btn-sm" data-target="#deleteModal'.$row['id'].'" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button></td>
                                                </tr>
                                                ';

                                                include('delete_modal.php');
                                                include('function.php');
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <button class="btn btn-warning btn-sm" data-target="#checkoutModal" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i> CHECK OUT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <?php include('checkout_confirmation.php'); ?>
    <?php include('add_modal.php'); ?>
    <?php include('function.php'); ?>
    <?php }
    include "../footer.php"; ?>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        $(function() {
            $("#table").dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 3]
                }],
                "aaSorting": []
            });
        });

        $("#addToCart").click(function () {
    var productId = $("#hidden_productid").val();
    var userId = $("#hidden_id").val();
    var quantity = $("#txt_quantity").val();

    // Make an AJAX request to add the item to the cart
    $.ajax({
        type: "POST",
        url: "process_add_to_cart.php",
        data: {
            product_id: productId,
            user_id: userId,
            quantity: quantity
        },
        dataType: "json",  // Parse the response as JSON
        success: function (response) {
            // Check the status in the response
            if (response.status === 'success') {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                }).then(function () {
                    // Reload the page or do other actions
                    location.reload();
                });
            } else {
                // Use SweetAlert for error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: response.message,
                });
            }
        },
        error: function (error) {
            // Use SweetAlert for general error message
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred. Please try again later.',
            });
            console.error(error);
        }
    });
});


$(document).ready(function() {
    updateTotal();

    function updateTotal() {
        var total = 0;
        $('#table tbody tr').each(function() {
            var subtotal = parseFloat($(this).find('td:eq(3)').text());
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });
        $('#txt_total').val(total.toFixed(2));
    }

    // Update the total when the page loads
    updateTotal();

    // Update the total when a change occurs in the table (e.g., item quantity changes)
    $('#table').on('change', 'input[type="text"]', function() {
        updateTotal();
    });

    // Handle the "CHECK OUT" button click
    $('#addToCheckOut').click(function() {
        // Get the total and customer name values
        var total = $('#txt_total').val();
        var customerName = $('#txt_customer').val();

        // You can now use the "total" and "customerName" values for your checkout process
    });
});



    

        </script>
</body>
</html>

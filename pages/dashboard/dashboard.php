<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
   .chart-container {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f4f4f4; /* Add your desired background color */
    width: 100%; /* Adjust the width as needed */
    height: 650px; /* Adjust the height as needed */
}



</style>

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
                        Dashboard
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                
                                
                               
                            <div class="col-md-3 col-sm-4 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../customer/customer.php"><span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total User</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tbluser");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>


                                <div class="col-md-3 col-sm-4 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../booking/booking.php"><span class="info-box-icon bg-grey"><i class="fa fa-table"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">total Category </span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblcategory where status='ACTIVE'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-4 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../booking/booking.php"><span class="info-box-icon bg-blue"><i class="fa fa-table"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">TOTAL PRODUCT</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblproduct where status='ACTIVE'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>


                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../inquiries/inquiries.php"><span class="info-box-icon bg-green"><i class="fa fa-question-circle"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">TOTAL SUPPLIER</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblsupplier");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="container">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="panel panel-default">
                                              <div class="panel-heading">
                                                  <h3 class="panel-title">Line Graph</h3>
                                              </div>
                                              <div class="panel-body">
                                                  <div class="chart-container">
                                                  <canvas id="order-status-bar-chart" style="width: 100%; height: 650px;"></canvas>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Users Overview</h3>
                                                </div>
                                                <div class="panel-body">
                                                      <table class="table gray-background-table">
                                                        <thead>
                                                            <tr>
                                                                <th>User Name</th>
                                                                <th>Role</th>
                                                                <!-- Add more table headers as needed -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        // Fetch customers with active and inactive status from your database
                                                        $query = "SELECT name, role FROM tbluser";
                                                        $result = mysqli_query($con, $query);
                                                        
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['name'] . "</td>";
                                                            if ($row['role'] == 'ADMINISTRATOR') {
                                                                echo "<td class='active-status'>" . $row['role'] . "</td>";
                                                            } elseif ($row['role'] == 'USER') {
                                                                echo "<td class='inactive-status'>" . $row['role'] . "</td>";
                                                            } else {
                                                                echo "<td>" . $row['role'] . "</td>";
                                                            }
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                              </div>


                            </div><!-- /.box -->
                    </div>   <!-- /.row -->
                </section>
                
                
                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>

        <?php 
        
       
        $query = "SELECT 
        DATE_FORMAT(date_created, '%Y-%m') AS month_year,
        SUM(CASE WHEN transno IS NULL THEN 1 ELSE 0 END) AS orders_in_cart,
        SUM(CASE WHEN transno IS NOT NULL THEN 1 ELSE 0 END) AS orders_checked_out
    FROM tblorder
    GROUP BY month_year
    ";
    
    $result = mysqli_query($con, $query);
    
    $months = [];
    $orders_in_cart = [];
    $orders_checked_out = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $months[] = $row['month_year'];
        $orders_in_cart[] = $row['orders_in_cart'];
        $orders_checked_out[] = $row['orders_checked_out'];
    }
    

    


        ?>
<script type="text/javascript">
 var ctx = document.getElementById('order-status-bar-chart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($months); ?>,
        datasets: [
            {
                label: 'Orders in Cart',
                data: <?php echo json_encode($orders_in_cart); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Orders Checked Out',
                data: <?php echo json_encode($orders_checked_out); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                stacked: true
            },
            y: {
                stacked: true
            }
        }
    }
});







  



    



    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>
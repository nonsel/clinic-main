<?php

echo '
	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info" style= margin-top:80px;>
                            <h4>Hello, ' . $_SESSION['role'] . '</h4>

                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    ';
if ($_SESSION['role'] == "Administrator") {
    echo '
                    <ul class="sidebar-menu">
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
                                </a>
                            </li>
                            <li>
                                <a href="../patient/patient.php">
                                    <i class="fa fa-user-md"></i> <span>Patient</span>
                                </a>
                            </li>

                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-briefcase"></i> <span>Prescription</span> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" style="background-color: black;">
                                    <li>
                                        <a href="../prescription/prescription.php">
                                            <i class="fa fa-file"></i> <span>Prescription</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../specialprescription/specialprescription.php">
                                            <i class="fa fa-file"></i> <span>Special Prescription</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                           <li>
                                <a href="../payments/payments.php">
                                    <i class="fa fa-user-md"></i> <span>Payments</span>
                                </a>
                            </li>

                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-briefcase"></i> <span>Inventory</span> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" style="background-color: black;">
                                    <li>
                                        <a href="../category/category.php">
                                            <i class="fa fa-file"></i> <span>Category</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../products/products.php">
                                            <i class="fa fa-file"></i> <span>Product</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../supplier/supplier.php">
                                    <i class="fa fa-industry"></i> <span>Supplier</span>
                                </a>
                            </li>
                            <li>
                                <a href="../posv2/pos_main.php">
                                    <i class="fa fa-shopping-cart"></i> <span>Sales</span>
                                </a>
                            </li>
                            <li>
                                <a href="../sold/sold.php">
                                    <i class="fa fa-book"></i> <span>Sold</span>
                                </a>
                            </li>
                            <li>
                                <a href="../user/user.php">
                                    <i class="fa fa-users"></i> <span>User</span>
                                </a>
                            </li>   
                            <li>
                                <a href="../logs/logs.php">
                                    <i class="fa fa-history"></i> <span>Logs</span>
                                </a>
                            </li>
                                                         
                    </ul>';
} else {
    echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../permit/permit.php">
                                    <i class="fa fa-file"></i> <span>Please Contact Administrator</span>
                                </a>
                            </li>
                          
                        </ul>';
}
echo '
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>
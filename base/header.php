<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>JMT</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/vendor/fonts/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="assets/vendor/dtable/datatables.min.css">
        <link rel="stylesheet" href="assets/vendor/dtable/Buttons-1.6.1/css/buttons.dataTables.css">
        <link rel="stylesheet" href="assets/vendor/dtable/DataTables-1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../serviceStation/assets/toastr/toastr.min.css">
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="index.html">Janasiri Motor Station</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-right-top">
                            <li class="nav-item">
                                <div id="custom-search" class="top-search-bar">
                                    <input class="form-control" type="text" placeholder="Search..">
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <div class="nav-left-sidebar sidebar-dark">
                <div class="menu-list">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-divider">
                                    Menu
                                </li>   
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-rocket"></i>Employee Registration</a>
                                    <div id="submenu-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">

                                            <li class="nav-item">
                                                <a class="nav-link" href="employee-registration.php">New Employee</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="employee-salary-advance.php">Employee Payments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="employee-list.php">Employee List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Reservation</a>
                                    <div id="submenu-2" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="reservation-pending.php">Approving Res</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="reservation-onprocess.php">On Process Res</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="employee-registration.php">Reservation History</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="employee-registration.php">User Reminders</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Customer Management</a>
                                    <div id="submenu-3" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="client-list.php">Client List</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Service Management</a>
                                    <div id="submenu-4" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="service-config.php">Service Configuration</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="services-suspend.php">Suspended Services</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fab fa-fw fa-wpforms"></i>Vehicle Management</a>
                                    <div id="submenu-5" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="vehicle-new.php">New Vehicle Registration</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Assign To Task-Not Created</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="vehicle-list.php">Vehicle List</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fab fa-fw fa-wpforms"></i>In House Stock</a>
                                    <div id="submenu-6" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="stock-new.php">Stock Registration</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="stock-purchase-order.php">Purchase Order's</a>
                                            </li>                                            
                                            <li class="nav-item">
                                                <a class="nav-link" href="stock-refill.php">Refilling List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="stock-suspend.php">Suspended Item's</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="stock-list.php">Inventory</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



                            <!--                                <li class="nav-item ">
                                                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Reservations</a>
                                                                <div id="submenu-3" class="collapse submenu" style="">
                                                                    <ul class="nav flex-column">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="pages/form-elements.html">Reservations</a>
                                                                        </li>
                            
                                                                    </ul>
                                                                </div>
                                                            </li>-->
                            <!--                                <li class="nav-item ">
                                                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Job Management</a>
                                                                <div id="submenu-3" class="collapse submenu" style="">
                                                                    <ul class="nav flex-column">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="pages/form-elements.html">Reservations</a>
                                                                        </li>
                            
                                                                    </ul>
                                                                </div>
                                                            </li>-->


                            <!--                                <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Reports</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/form-elements.html">Reservations</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>-->
                            <!--                                <li class="nav-item ">
                                                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Payment Management</a>
                                                                <div id="submenu-3" class="collapse submenu" style="">
                                                                    <ul class="nav flex-column">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="pages/form-elements.html">Reservations</a>
                                                                        </li>
                            
                                                                    </ul>
                                                                </div>
                                                            </li>-->
                            <!--                                <li class="nav-item ">
                                                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Settings</a>
                                                                <div id="submenu-3" class="collapse submenu" style="">
                                                                    <ul class="nav flex-column">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="pages/form-elements.html">Reservations</a>
                                                                        </li>
                            
                                                                    </ul>
                                                                </div>
                                                            </li>-->

                            <!--                                <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Equipment Management</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/form-elements.html">Reservations</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>-->
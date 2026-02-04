<?php
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Covid-19 | Dashboard</title>
        <link rel="icon" href="IMG/favicon.png">

        <!--CUSTOM FONTS FOR THIS TEMPLATE-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!--CUSTOM STYLES FOR THIS TEMPLATE-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">
        <div id="wrapper">
            <?php include_once('includes/sidebar.php'); ?>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php'); ?>


                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                            <a href="bwdates-report-ds.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>

                        <!--CONTENT ROW-->
                        <div class="row">

                            <?php

                            //TOTAL TESTS
                            $query = mysqli_query($con, "select id from tbltestrecord");
                            $totaltest = mysqli_num_rows($query);

                            //ASSIGNED TESTS
                            $query1 = mysqli_query($con, "select id from tbltestrecord where ReportStatus='Assigned'");
                            $totalassigned = mysqli_num_rows($query1);

                            //ON WAY FOE SAMPLE COLLECCTION
                            $query2 = mysqli_query($con, "select id from tbltestrecord where ReportStatus='On the Way for Collection'");
                            $totalontheway = mysqli_num_rows($query2);

                            //SAMPLE COLLECTED
                            $query3 = mysqli_query($con, "select id from tbltestrecord where ReportStatus='Sample Collected'");
                            $totalsamplecollected = mysqli_num_rows($query3);

                            //SENT FOR LAB
                            $query4 = mysqli_query($con, "select id from tbltestrecord where ReportStatus='Sent to Lab'");
                            $totalsenttolab = mysqli_num_rows($query4);

                            //REPORT DELIVERED
                            $query5 = mysqli_query($con, "select id from tbltestrecord where ReportStatus='Delivered'");
                            $totaldelivered = mysqli_num_rows($query5);

                            //TOTALL REGISTERED PATIENTS
                            $query6 = mysqli_query($con, "select id from tblpatients");
                            $totalpatients = mysqli_num_rows($query6);

                            //TOTALL REGISTERED PHLEBOTOMIST 
                            $query7 = mysqli_query($con, "select id from tblphlebotomist");
                            $totalphlebotomist = mysqli_num_rows($query7);
                            ?>

                            <!--TOTAL TESTS-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <a href="all-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Tests</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltest; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-virus fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--ASSIGNED TEST-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="assigned-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total Assigned</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalassigned; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--ON THE WAY FOR SAMPLE COLLECTION-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <a href="ontheway-samplecollection-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> On the way for sample collection
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalontheway; ?></div>
                                                        </div>
                                                        <div class="col">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--SAMPLE COLLECTED-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <a href="sample-collected-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Sample Collected</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalsamplecollected; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-prescription-bottle fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--SENT TO LAB-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <a href="samplesent-lab-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Sample Sent to Lab</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalsenttolab; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-microscope fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--REPORT DELIVERED-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <a href="reportdelivered-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Report Delivered
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totaldelivered; ?></div>
                                                        </div>
                                                        <div class="col">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--TOTAL REGISTERED PATIENTS-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">

                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">


                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Registered Patients</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalpatients; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TOTAL REGISTERED PHLEBOTOMIST-->

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="manage-phlebotomist.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">

                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total Registered Phlebotomist</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalphlebotomist; ?></div>
                                                </div>

                                                <div class="col-auto">
                                                    <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <!--CONTENT ROW-->

                        

                    </div>

                </div>

                <?php include_once('includes/footer2.php'); ?>
                <!--BOOTSTRAP CORE JAVASCRIPT-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!--CORE PLUGIN JAVASCRIPT-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!--CUSTOM SCRIPTS FOR ALL PAGES -->
                <script src="js/sb-admin-2.min.js"></script>

                <!--PAGE LEVEL PLUGINS-->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!--PAGE LEVEL CUSTOM SCRIPTS-->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>


                <?php include_once('includes/footer.php'); ?>
    </body>

    </html>
<?php } ?>
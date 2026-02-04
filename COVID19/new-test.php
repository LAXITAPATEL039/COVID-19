<?php session_start();
//DB  CONNCETION

include_once('includes/config.php');
//ERROR_REPORTING(0);
//VALIDATING SESSION

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

        <title>Covid-19 | New Test Request</title>
        <link rel="icon" href="IMG/favicon.png">
        
        <!--CUSTOM FONTS FOR THIS TEMPLATE-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!--CUSTOM STYLES FOR THIS TEMPLATE-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!--CUSTOM STYLES FOR THIS PAGE-->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!--PAGE WRPPAER-->
        <div id="wrapper">

            <!--SODEBAR-->
            <?php include_once('includes/sidebar.php'); ?>
            <!--END OF SIDEBAR-->

            <!--CONTENT WRAPPER-->
            <div id="content-wrapper" class="d-flex flex-column">

                <!--MAIN CONTENT-->
                <div id="content">

                    <!--TOPBAR-->
                    <?php include_once('includes/topbar.php'); ?>
                    <!--END OF TOPBAR-->

                    <!--BEGIN PAGE CONTENT-->
                    <div class="container-fluid">

                        <!--PAGE HEADING-->
                        <h1 class="h3 mb-2 text-gray-800">New Test Requests</h1>


                        <!--DATATABLES EXAMPLE-->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">New Test Requests</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form name="assignto" method="post">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Order No.</th>
                                                    <th>Patient Name</th>
                                                    <th>Mobile No.</th>
                                                    <th>Test Type</th>
                                                    <th>Time Slot</th>
                                                    <th>Reg. Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Order No.</th>
                                                    <th>Patient Name</th>
                                                    <th>Mobile No.</th>
                                                    <th>Test Type</th>
                                                    <th>Time Slot</th>
                                                    <th>Reg. Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $query = mysqli_query($con, "select tbltestrecord.OrderNumber,tblpatients.FullName,tblpatients.MobileNumber,tbltestrecord.TestType,tbltestrecord.TestTimeSlot,tbltestrecord.RegistrationDate,tbltestrecord.id as testid from tbltestrecord join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber where ReportStatus is null");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['OrderNumber']; ?></td>
                                                        <td><?php echo $row['FullName']; ?></td>
                                                        <td><?php echo $row['MobileNumber']; ?></td>
                                                        <td><?php echo $row['TestType']; ?></td>
                                                        <td><?php echo $row['TestTimeSlot']; ?></td>
                                                        <td><?php echo $row['RegistrationDate']; ?></td>
                                                        <td>

                                                            <a href="test-details.php?tid=<?php echo $row['testid']; ?>&&oid=<?php echo $row['OrderNumber']; ?>" class="btn btn-info btn-sm">View Details</a>

                                                        </td>
                                                    </tr>
                                                <?php $cnt++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--/.container-fluid-->

                </div>
                <!--END OF MAIN CONTENT-->

                <!--FOOTER-->
                <?php include_once('includes/footer.php'); ?>
                <!--END OF FOOTER-->

            </div>
            <!--END OF CONTENT WRAPPER-->

        </div>
        <!--END OF PAGE WRAPPER-->

        <!--SCROLL TO TOP BUTTON-->
        <?php include_once('includes/footer2.php'); ?>

        <!--BOOTSTRAP CORE JAVASCRIPT-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!--CORE PIUGIN JAVASCRIPT -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!--CUSTOM SCRIPTS FOER ALL PAGES-->
        <script src="js/sb-admin-2.min.js"></script>

        <!--PAGE LEVEL PLUGINS-->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!--PAGE LEVE; CUSTOM SCRIPTS-->
        <script src="js/demo/datatables-demo.js"></script>
    </body>

    </html>
<?php } ?>
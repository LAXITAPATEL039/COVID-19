<?php
session_start();
error_reporting(0);

//DB CONNCETION
include_once('includes/config.php');

//ERROR_REPORTING(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid-19 | Statewise Testing Dashboard</title>
    <link rel="icon" href="IMG/favicon.png">

    <!--CUSTOM FONTS FOR THIS TEMPLATE-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!--CUUSTOM STYLES FOR THIS TEMPLATE-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!--CUSTOM STYLES FOR THIS PAGE-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <?php include_once('includes/sidebar.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include_once('includes/topbar.php'); ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Statewise Testing Dashboard</h1>

                    <!--DATATABLES EXAMPLE-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Statewise Testing Dashboard</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="assignto" method="post">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>State Name</th>
                                                <th>Total Test Done</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>State Name</th>
                                                <th>Total Test Done</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $query = mysqli_query($con, "select  tblpatients.State as state,count(tbltestrecord.id) as totaltest from tbltestrecord join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber group by tblpatients.State");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['state']; ?></td>
                                                    <td><?php echo $row['totaltest']; ?></td>
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

                <!-- /.container-fluid -->

            </div>

            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!--BOOTSTRAP CORE JAVCASCRIPT-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--CORE PLUGIN JAVASCRIPT-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!--CUSTOM SCRIPTS FOR ALL PAGES-->
    <script src="js/sb-admin-2.min.js"></script>

    <!--PAGE LEVEL PLUGINS-->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!--PAGE LEVEL CUSTOM SCRIPTS-->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
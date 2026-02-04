<?php session_start();
//DB CONNECTION

include_once('includes/config.php');
error_reporting(0);
//VALIDATING SESSION

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        //GETTING POST VALUES
        $mnumber = $_POST['mobilenumber'];
        $testtype = $_POST['testtype'];
        $timeslot = $_POST['birthdaytime'];
        $orderno = mt_rand(100000000, 999999999);
        $query = "insert into tbltestrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Your test request submitted successfully. Order number is "+"' . $orderno . '")</script>';
            echo "<script>window.location.href='registered-user-testing.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='registered-user-testing.php'</script>";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Covid-19 | B/w Dates Report Date Selection</title>
        <link rel="icon" href="IMG/favicon.png">

        <!--CUSTOM FONTS FOR THIS TEMPLATE-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!--CUSTOM STYLES FOR THIS TEMPLATE-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
            label {
                font-size: 16px;
                font-weight: bold;
                color: #000;
            }
        </style>
    </head>

    <body id="page-top">

        <!--PAGE WRAPPER-->
        <div id="wrapper">

            <?php include_once('includes/sidebar.php'); ?>

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">

                    <?php include_once('includes/topbar.php'); ?>

                    <!--BEGIN PAGE CONTENT-->
                    <div class="container-fluid">

                        <!--PAGE HEADING-->
                        <h1 class="h3 mb-4 text-gray-800">B/w Dates Report Date Selection</h1>

                        <form method="post" action="bwdates-report-result.php">
                            <div class="row">

                                <div class="col-lg-6">

                                    <!--BASIC CARD EXAMPLE-->
                                    <div class="card shadow mb-4">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="date" class="form-control" id="fromdate" name="fromdate" required="true">
                                            </div>

                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="date" class="form-control" id="todate" name="todate" required="true">
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- /.container-fluid -->

                </div>

                <?php include_once('includes/footer.php'); ?>

            </div>
        </div>

        <?php include_once('includes/footer2.php'); ?>


        <!--BOOTSTRAP CORE JAVASCRIPT-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!--CORE PLUGIN JAVASCRIPT-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!--CUSTOM SCRIPTS FOR ALL PAGES-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

    </html>
<?php } ?>
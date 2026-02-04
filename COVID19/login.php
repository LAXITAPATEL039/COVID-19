<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $Password = md5($_POST['inputpwd']);
    $query = mysqli_query($con, "select ID from tbladmin where  AdminuserName='$uname' && Password='$Password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['aid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        echo "<script>alert('Invalid Details.');</script>";
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

    <title>Covid-19 Testing Management System | Admin Login</title>
    <link rel="icon" href="IMG/favicon.png">

    <!--CUSTOM FONTS FOR THIS TEMPLATE-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!--CUSTOM STYLES FOR THIS TEMPLATE-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <form name="login" method="post">
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="70" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z" />
                                    </svg>
                                </h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="inputpwd" id="inputpwd" placeholder="Password">
                                </div>
                                <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="login">
                            </form>
                            <div class="d-flex justify-content-between mt-4">
                                <a class="small" href="password-recovery.php"><i class="fa fa-lock" aria-hidden="true"></i> Forgot Password?</a>
                                <a class="small" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--BOOTSTRAP CORE JAVASCRIPT-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--CORE PLUGIN JAVASCRIPT-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!--CUSTOM SCRIPTS FOR ALL PAGES-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
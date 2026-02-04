<?php
//TIMEZONE
date_default_timezone_set('Asia/Kolkata');

//DATABASE CONNECTION
$con=mysqli_connect("localhost","root","","covid_tms_db");
if(mysqli_connect_errno()){
    echo"Connection Fail".mysqli_connect_error();
}
?>
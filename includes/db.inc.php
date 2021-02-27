<?php

//Connect to server
$con = mysqli_connect("localhost", "root", "") or die(mysql_error());

if ($con) {
    //Connect to database
    mysqli_select_db($con, "event_management") or die("Cannot connect to database" . mysql_error());
} else {
    die("Connection failed: " . mysql_connect_error());
}

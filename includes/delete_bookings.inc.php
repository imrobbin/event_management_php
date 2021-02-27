<?php

session_start();

require 'db.inc.php';

$id = $_GET['id'];

echo $id;
// delete only if ID is not empty and record belongs to logged_user 
if ($id !== 0 && isset($_SESSION['email'])) {
  $logged_user = $_SESSION['email'];
  echo $logged_user;
  // sql query to delete a record
  $sql = "DELETE FROM bookings WHERE id = '$id' AND booked_by = '$logged_user'";
  $result = mysqli_query($con, $sql);
  echo $result;
  if ($result) {
    echo $logged_user;
    // delete success
    //redirect to your main page where you list all records
    header('Location: ../dashboard.php?error=recorddeleted');
    exit();
  } else {
    // no user found get back to login
    // header('Location: ../dashboard.php?error=recordnotfound');
    exit();
  }
} else {
}

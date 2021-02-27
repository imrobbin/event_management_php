<?php
// When form submitted, insert values into the database.

// https://phppot.com/php/user-registration-in-php-with-login-form-with-mysql-and-code-download/
if (isset($_REQUEST['register-submit'])) {

  require 'db.inc.php';

  // removes backslashes
  $fullname = stripslashes($_REQUEST['fullname']);
  //escapes special characters in a string
  $fullname = mysqli_real_escape_string($con, $fullname);
  $email    = stripslashes($_REQUEST['email']);
  $email    = mysqli_real_escape_string($con, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con, $password);
  $mobile = stripslashes($_REQUEST['mobile']);
  $mobile = mysqli_real_escape_string($con, $mobile);
  $address = stripslashes($_REQUEST['address']);
  $address = mysqli_real_escape_string($con, $address);
  $created_at = date("Y-m-d H:i:s");


  $sqlQuery = "SELECT * FROM `customers` WHERE email='$email'";
  $result = mysqli_query($con, $sqlQuery);
  $isUserExist = mysqli_num_rows($result);

  if ($isUserExist) {
    // user already exist with provided email ... get back to register and show msg
    header('Location: ../register.php?status=register&message=userexist');
    exit();
  } else {
    // no user exist with provided email register to database
    $query = "INSERT into `customers` (email, password, fullname, mobile, address, created_at) VALUES ('$email', '$password', '$fullname','$mobile', '$address','$created_at')";
    $result = mysqli_query($con, $query);
    if ($result) {
      // user registration success ...  get back to register page
      header('Location: ../register.php?status=success&message=useradded');
      exit();
    } else {
      // user registration success ...  get back to register page
      header('Location: ../register.php?status=failed&message=unknownerror');
      exit();
    }
  }
} else {
  header('Location: ../register.php?status=register&message=adduser');
  exit();
}

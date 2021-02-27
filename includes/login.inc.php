<?php

if (isset($_POST['login-submit'])) {

    require 'db.inc.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // check all login fields are filled [NOT EMPTY]
    if (empty($email) || empty($password)) {
        header('Location: ../login.php?error=emptyfields');
        exit();
    } else {

        $sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";

        // run the above sql query to fetch data from DB
        $result = mysqli_query($con, $sql);

        //Checks if email exists
        $row = mysqli_num_rows($result);

        if ($row = mysqli_fetch_assoc($result)) {
            // Display the correct user and start a session with email
            session_start();
            $_SESSION['userId'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['role'] = $row['role'];

            header('Location: ../dashboard.php');
            exit();
        } else {
            // no user found get back to login
            header('Location: ../login.php?error=usernotfound');
            exit();
        }
    }
} else {
    header('Location: ../login.php');
    exit();
}

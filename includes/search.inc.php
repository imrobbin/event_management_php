<?php

if (isset($_POST['search-submit'])) {

    require 'db.inc.php';

    $search = $_POST['searched-text'];

    // Make a search query
    $sql = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";

    // run the above sql query to fetch data from DB
    $result = mysqli_query($con, $sql) or die("Could not search" . mysqli_error($con));

    //Checks if username exists
    $row = mysqli_num_rows($result);

    if ($row == 0) {
        // No result found .. does not get any matching result
        header('Location: ../library.php?result=nomatchfound');
        exit();
    } else {
        // no user found get back to login
        header('Location: ../library.php?result=' . $row);
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}

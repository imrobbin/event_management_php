<?php

session_start();
if (isset($_POST['booking-submit'])) {

    require 'db.inc.php';

    $booking_date = $_POST['booking_date'];
    $event_name = $_POST['event_name'];
    $event_venue = $_POST['event_venue'];
    $event_theme = $_POST['event_theme'];
    $booked_by = $_SESSION['email'];

    $sql = "INSERT INTO bookings (booking_date, event_name, event_venue, event_theme, booked_by) VALUES ('$booking_date', '$event_name', '$event_venue', '$event_theme', '$booked_by')";
    // run the above sql query to insert data into DB
    $result = mysqli_query($con, $sql);

    if ($result) {
        // event booking success ...  get back to event booking page
        header('Location: ../event_booking.php?status=success&message=eventadded');
        exit();
    } else {
        // event booking failed ...  get back to event booking page
        header('Location: ../event_booking.php?status=failed&message=unknownerror');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}

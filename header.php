<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Event Booking System</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">
                <h1>Event Booking System</h1>
            </a>
            <ul class="nav-links">
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<li class="nav-item"><a href="dashboard.php">Dashboard</a></li>';
                }
                ?>
                <li class="nav-item"><a href="about.php">About</a></li>
                <li class="nav-item"><a href="contact.php">Contact</a></li>

                <?php
                if (isset($_SESSION['email'])) {
                    if ($_SESSION['role'] == 'customer') {
                        echo '<li class="nav-item"><a href="event_booking.php">Book Event</a></li>';
                    }
                    echo '
                    <li class="nav-item logout-btn">
                        <form action="includes/logout.inc.php" method="post">
                            <button type="submit" class="logout-btn" name="logout-submit">Logout</button>
                        </form>
                    </li>';
                } else {
                    echo '
                    <li class="nav-item"><a href="login.php">Login</a></li>
                    <li class="nav-item"><a href="register.php">Register</a></li>
                    ';
                }
                ?>

            </ul>
        </nav>




    </header>
<!-- include common header for every page -->
<?php require "header.php"; ?>

<!-- main content for this page  -->
<main class="main-container">

    <?php
    if (isset($_SESSION['email'])) {
        echo '<h2>Welcome ' . $_SESSION['fullname'] . '</h2>';
    }
    ?>

    <div class="wrap">
        <div class="booking-table">
            <div class="grid-container">
                <div class="grid-child">
                    <img src="./images/event-management-system-project.jpg" alt="event management">
                </div>
                <div class="grid-child">
                    <p>
                        Planning is most important for the success of any event or function. Proper planning makes your work easy. Decoration is the main part of any event or function.
                    </p>
                    <br />
                    <p>
                        Planning of decoration is a tedious work. It involves every little thing about lighting, seating arrangement, stage etc. With this application every part of an event like menu detail, music type, venue of event etc. can be pre planned. For planning of new event a new order is added.
                    </p>
                    <br />
                    <p>
                        After giving it any meaningful name other details are chosen from the list menu according to the customers need and interest. This project also keeps record of old customers. It is very useful for promoting new updates and service. This system will save time of planning and makes process fast.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- include common footer for every page -->
<?php require "footer.php"; ?>
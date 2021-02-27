<!-- include common header for every page -->
<?php

require "header.php";
// show login page only if user is not logged in
if (isset($_SESSION["email"])) {

?>

  <!-- main content for this page  -->
  <main class="main-container">

    <div class="wrap">
      <form class="login-form" action="includes/event_booking.inc.php" method="post">
        <div class="form-header">
          <h3>Book an Event</h3>
          <br />

          <!-- Display Error Message on wrong input--->
          <?php
          if (isset($_GET['status']) && isset($_GET['message'])) {
            if ($_GET['message'] == "eventadded") {
              echo '<p class="success">Event Booked successfully</p>';
            } else if ($_GET['message'] == "unknownerror") {
              echo '<p class="error">Unable to book event.</p>';
            }
          }
          ?>
        </div>

        <!-- Date Input-->
        <div class="form-group">
          <input type="date" class="form-input" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" name="booking_date" placeholder="Event Date (yyyy-mm-dd)" required="required">
        </div>
        <!--Event Name Input-->
        <div class="form-group">
          <input type="text" class="form-input" name="event_name" placeholder="Event Name" required="required">
        </div>

        <!--event_venue Input-->
        <div class="form-group">
          <input type="text" class="form-input" name="event_venue" placeholder="Event Venue" required="required">
        </div>

        <!--event_theme Input-->
        <div class="form-group">
          <input type="text" class="form-input" name="event_theme" placeholder="Event Theme" required="required">
        </div>

        <!--Login Button-->
        <div class="form-group">
          <button type="submit" class="form-button" name="booking-submit">Book</button>
        </div>

      </form>
    </div>

  </main>


  <!-- include common footer for every page -->
<?php require "footer.php";
} else {
  // user login exist then redirect to dashboard
  header("Location: index.php");
  exit();
} ?>
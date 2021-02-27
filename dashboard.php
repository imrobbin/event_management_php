<!-- include common header for every page  && $_SESSION['role'] == 'admin' -->
<?php
require "header.php";
if (isset($_SESSION['email'])) {
?>

	<!-- main content for this page  -->
	<main class="main-container">
		<?php
		echo '<h2>Welcome ' . $_SESSION['fullname'] . '</h2>';
		?>

		<div class="wrap">
			<div class="booking-table">
				<div class="form-header">
					<h3>Booked Events</h3>
					<br />
					<p>list of all the upcomming booked events</p>
				</div>

				<?php
				require 'includes/db.inc.php';

				$logged_user = $_SESSION['email'];
				if ($_SESSION['role'] == 'admin') {
					$sql = "SELECT * FROM bookings";
				} else {
					$sql = "SELECT * FROM bookings WHERE booked_by='$logged_user'";
				}

				// run the above sql query to fetch data from DB
				$bookings = mysqli_query($con, $sql) or die("Could not search" . mysqli_error($con));

				//Checks if bookings exists
				$row = mysqli_num_rows($bookings);

				if ($row > 0) {
					// create a table with all the existing bookings
					echo '
							<table id="bookings">
								<tr><th>#</th><th>Date</th><th>Event</th><th>Event Venue</th><th>Event Theme</th><th>Booked By</th>';
					if ($_SESSION['role'] == 'customer') {
						echo '<th>Action</th></tr><tr>';
					} else {
						echo '</tr><tr>';
					}
					$i = 0;

					while ($row = mysqli_fetch_assoc($bookings)) {
						++$i;
						echo '
									<td>' . $i . '</td>
									<td>' . $row['booking_date'] . '</td>
									<td>' . $row['event_name'] . '</td>
									<td>' . $row['event_venue'] . '</td>
									<td>' . $row['event_theme'] . '</td>
									<td>' . $row['booked_by'] . '</td>
						';
						if ($_SESSION['role'] == 'customer') {
							echo '<td><a href=includes/delete_bookings.inc.php?id=' . $row['id'] . '>DELETE</a></td>';
						}
					}
					echo '
								</tr>
							</table>';
				} else {
					// no bookings found just show the message
					echo '<p class="error"> No events found</p>';
				}
				?>

			</div>
		</div>

	</main>

<?php
	#<!-- include common footer for every page -->
	require "footer.php";
} else {
	header('Location: login.php');
	exit();
}
?>
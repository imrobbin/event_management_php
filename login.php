<!-- include common header for every page -->
<?php

require "header.php";
// show login page only if user is not logged in
if (!isset($_SESSION["email"])) {

?>

    <!-- main content for this page  -->
    <main class="main-container">

        <div class="wrap">
            <form class="login-form" action="includes/login.inc.php" method="post">
                <div class="form-header">
                    <h3>Login Form</h3>
                    <br />

                    <!-- Display Error Message on wrong input--->
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p class="error">Fill in all fields!</p>';
                        } else if ($_GET['error'] == "usernotfound") {
                            echo '<p class="error">Invalid email or password</p>';
                        }
                    }
                    ?>
                </div>

                <!--Email Input-->
                <div class="form-group">
                    <input type="text" class="form-input" name="email" placeholder="Email" required="required">
                </div>

                <!--Password Input-->
                <div class="form-group">
                    <input type="password" class="form-input" name="password" placeholder="Password" required="required">
                </div>

                <!--Login Button-->
                <div class="form-group">
                    <button type="submit" class="form-button" name="login-submit">Login</button>
                </div>

                <div class="form-footer">
                    Don't have an account? <a href="register.php">Register</a>
                </div>
            </form>
        </div>

    </main>


    <!-- include common footer for every page -->
<?php require "footer.php";
} else {
    // user login exist then redirect to dashboard
    header("Location: dashboard.php");
    exit();
} ?>
<!-- include common header for every page -->
<?php

// show login page only if user is not logged in
if (!isset($_SESSION["email"])) {

    require "header.php";

    // reload the page with status=register
    if (!isset($_GET['status'])) {
        header('Location: register.php?status=register&message=adduser');
        exit();
    } else if (isset($_GET['status'])) {
        // get the status and message code from the url
        // list($status, $message) = explode('_', $_GET['status']);
        $status = $_GET['status'];
        $message = $_GET['message'];

?>

        <!-- main content for this page  -->
        <main class="main-container">
            <div class="wrap">
                <!--  show register form when status=register   -->
                <?php if ($status == 'register') { ?>

                    <form class="login-form" action="includes/register.inc.php" method="post">
                        <div class="form-header">
                            <h3>Registration Form</h3>
                            <br />

                            <?php
                            if ($message == 'userexist') {
                                echo '<p class="error">User exist with given email</p>';
                            }
                            ?>
                        </div>

                        <!--Full Name Input-->
                        <div class="form-group">
                            <input type="text" name="fullname" class="form-input" required="required" placeholder="Full Name">
                        </div>

                        <!--Email Input-->
                        <div class="form-group">
                            <input type="text" name="email" class="form-input" required="required" placeholder="Email">
                        </div>

                        <!--Password Input-->
                        <div class="form-group">
                            <input type="password" name="password" class="form-input" required="required" placeholder="Password">
                        </div>

                        <!--Mobile Number Input-->
                        <div class="form-group">
                            <input type="text" name="mobile" class="form-input" required="required" placeholder="Mobile Number">
                        </div>

                        <!--Address Input-->
                        <div class="form-group">
                            <textarea type="text" name="address" class="form-input" required="required" placeholder="Address"></textarea>
                        </div>

                        <!--Login Button-->
                        <div class="form-group">
                            <button type="submit" class="form-button" name="register-submit">Register</button>
                        </div>

                        <div class="form-footer">
                            Already have an account? <a href="login.php">Login</a>
                        </div>
                    </form>

                    <!--  show register success message with login btn when status=registersuccess  -->
                <?php
                } else if ($status == "success") {
                    echo '
                <div class="login-form">
                    <div class="form-footer">
                        <h3 class="success">You are registered successfully.</h3><br/>
                        <p class="link">Click here to <a href="login.php">Login</a></p>
                    </div>
                </div>';
                } else if ($status == "failed") {
                    echo '
                <div class="login-form">
                    <div class="form-footer">
                        <h3 class="error">Registration Failed!</h3><br/>
                        <p class="link">Click here to <a href="register.php">Try again</a></p>
                    </div>
                </div>';
                }
                ?>

            </div>
        </main>

    <?php } ?>

    <!-- include common footer for every page -->
<?php
    require "footer.php";
} else {
    // user login exist then redirect to dashboard
    header("Location: dashboard.php");
    exit();
} ?>
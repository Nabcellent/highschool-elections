<?php
$page_title = "Sign-up";
require_once "resources/templates/header.php";

?>

    <div class="container h-75">
        <div class="row h-100 justify-content-center" id="sign_up_row">
            <form class="col-9 my-auto p-4 rounded bg-light" id="student_sign_up_form" action="includes/sign_up.inc.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="font-weight-bold">SIGN UP</h3>
                        <hr class="bg-dark">
                    </div>
                    <div class="col-md-8">
                        <?php
                        if (isset($_GET["error"])) {
                            if($_GET["error"] === "empty_input") {
                                echo "<p class='text-warning'>FILL IN ALL FIELDS!</p>";
                            } else if($_GET["error"] === "passwords_not_matching") {
                                echo "<p class='text-warning'>PASSWORDS DO NOT MATCH!</p>";
                            } else if($_GET["error"] === "email_taken") {
                                echo "<p class='text-warning'>EMAIL ALREADY TAKEN!</p>";
                            } else if($_GET["error"] === "statement_failed") {
                                echo "<p class='text-warning'>Oops! Something went wrong, Please try again!</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name :</label>
                            <input class="form-control" type="text" id="first_name" name="first_name" placeholder="Enter First Name *">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name :</label>
                            <input class="form-control" type="text" id="first_name" name="last_name" placeholder="Enter Last Name *">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label for="signup_email">Email :</label>
                    <input class="form-control" type="email" id="signup_email" name="signup_email" placeholder="Enter your Email">
                    <span id="availability"></span>
                </div>
                <div class="col-md-12 form-group">
                    <label for="password">Password :</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your Password">
                </div>
                <div class="col-md-12 form-group">
                    <label for="password_confirm">Confirm Password :</label>
                    <input class="form-control" type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your Password">
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <input class="btn btn-danger" type="submit" id="btn_save_sign_up" name="submit" value="SIGN UP">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php

require_once "resources/templates/footer.php";
?>
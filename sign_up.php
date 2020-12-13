<?php
$page_title = "Sign-up";
require_once "resources/templates/header.php";

?>

<div class="container h-75">
    <div class="row h-100 justify-content-center" id="sign_up_row">
        <form class="col-9 my-auto p-4 rounded bg-light" id="signup_form" action="includes/sign_up.inc.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="font-weight-bold">SIGN UP</h3>
                    <hr class="bg-dark">
                </div>
                <div class="col-md-8">
                    <?php
                    if (isset($_GET["error"])) {
                        if($_GET["error"] === "empty_input") {
                            echo "<h4 class='text-info text-right'>FILL IN ALL FIELDS!</h4>";
                        } else if($_GET["error"] === "passwords_not_matching") {
                            echo "<h4 class='text-info text-right'>PASSWORDS DO NOT MATCH!</h4>";
                        } else if($_GET["error"] === "email_taken") {
                            echo "<h4 class='text-info text-right'>EMAIL ALREADY TAKEN!</h4>";
                        } else if($_GET["error"] === "statement_failed") {
                            echo "<h4 class='text-info text-right'>Oops! Something went wrong, Please try again!</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row ml-3">
                <div class="form-group">
                    <label class="frm_labels">Admin Level :</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="admin" name="admin_level" value="admin">
                        <label class="form-check-label" for="admin">Admin </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="standard" name="admin_level" value="standard">
                        <label class="form-check-label" for="standard">Standard </label>
                    </div>
                </div>
            </div>
            <div class="row col-lg mx-auto">
                <div class="form-group col-md-6 pl-0">
                    <label for="first_name">First Name :</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" placeholder="Enter First Name *">
                </div>
                <div class="form-group col-md-6 pr-0">
                    <label for="last_name">Last Name :</label>
                    <input class="form-control" type="text" id="first_name" name="last_name" placeholder="Enter Last Name *">
                </div>
            </div>
            <div class="form-group col-lg mx-auto">
                <label for="signup_email">Email :</label>
                <input class="form-control" type="email" id="signup_email" name="signup_email" placeholder="Enter your Email">
                <span id="availability"></span>
            </div>
            <div class="form-group col-lg mx-auto">
                <label for="password">Password :</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter your Password">
            </div>
            <div class="form-group col-lg mx-auto">
                <label for="password_confirm">Confirm Password :</label>
                <input class="form-control" type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your Password">
            </div>
            <div class="form-group col-lg mx-auto">
                <input class="btn btn-danger float-right" type="submit" id="btn_save_sign_up" name="submit" value="SIGN UP">
            </div>
        </form>
    </div>
</div>

<?php

require_once "resources/templates/footer.php";
?>
<?php
include 'header.php';
?>

<div class="container">
    <div class="row mt-lg-4">
        <div class="col">
            <form class="mx-auto" id="signup_form" action="includes/sign_up.inc.php" method="post">
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold">SIGN UP</h3>
                    </div>
                    <div class="col">
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
                <div class="row col-lg mx-auto">
                    <div class="form-group col-md-6 pl-0">
                        <label class="frm_labels" for="admin_level">Admin Level :</label>
                        <input type="radio" id="admin" name="admin_level" value="admin">
                        <label for="student">Admin </label>
                        <input type="radio" id="standard" name="admin_level" value="standard">
                        <label for="admin">Standard </label>
                    </div>
                </div>
                <div class="row col-lg mx-auto">
                    <div class="form-group col-md-6 pl-0">
                        <label class="frm_labels" for="first_name">First Name :</label>
                        <input class="frm_inputs" type="text" id="first_name" name="first_name" placeholder="Enter First Name *">
                    </div>
                    <div class="form-group col-md-6 pr-0">
                        <label class="frm_labels" for="last_name">Last Name :</label>
                        <input class="frm_inputs" type="text" id="first_name" name="last_name" placeholder="Enter Last Name *">
                    </div>
                </div>
                <div class="form-group col-lg mx-auto">
                    <label class="frm_labels" for="signup_email">Email :</label>
                    <input class="frm_inputs" type="email" id="signup_email" name="signup_email" placeholder="Enter your Email">
                    <span id="availability"></span>
                </div>
                <div class="form-group col-lg mx-auto">
                    <label class="frm_labels" for="password">Password :</label>
                    <input class="frm_inputs" type="password" id="password" name="password" placeholder="Enter your Password">
                </div>
                <div class="form-group col-lg mx-auto">
                    <label class="frm_labels" for="password_confirm">Confirm Password :</label>
                    <input class="frm_inputs" type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your Password">
                </div>
                <div class="form-group col-lg mx-auto">
                    <input class="btn btn-danger float-right" type="submit" id="btn_save_sign_up" name="submit" value="SIGN UP">
                </div>
            </form>
        </div>
    </div>
</div>

<?php

include_once 'footer.php';
?>
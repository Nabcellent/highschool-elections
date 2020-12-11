<?php
$page_title = "Login";
require_once 'header.php';
?>

<div class="container">
    <div class="row mt-lg-4">
        <div class="col">
            <form class="mx-auto" id="login_form" action="includes/login.inc.php" method="post">
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold">LOGIN</h3>
                    </div>
                    <div class="col">
                        <?php
                        if (isset($_GET["error"])) {
                            if($_GET["error"] === "empty_input") {
                                echo "<p class='text-warning'>FILL IN ALL FIELDS!</p>";
                            } else if($_GET["error"] === "invalid_user") {
                                echo "<p class='text-warning'>INVALID USERNAME/EMAIL!</p>";
                            } else if($_GET["error"] === "invalid_password") {
                                echo "<p class='text-warning'>YOUR PASSWORD WAS INCORRECT, RETRY!</p>";
                            } else if($_GET["error"] === "none") {
                                echo "<p class='text-success font-weight-bolder'>YOU HAVE SUCCESSFULLY SIGNED UP!<br>PLEASE LOG IN...</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group col-lg mx-auto">
                    <label class="frm_labels" for="name">Username/Email :</label>
                    <input class="frm_inputs" type="text" id="name" name="name" placeholder="Enter your Username/Email *">
                </div>
                <div class="form-group col-lg mx-auto">
                    <label class="frm_labels" for="password">Password :</label>
                    <input class="frm_inputs" type="password" id="password" name="password" placeholder="Enter your Password *">
                </div>
                <div class="form-group col-lg mx-auto">
                    <input class="btn btn-danger float-right" type="submit" name="submit" value="LOGIN">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
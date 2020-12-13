<?php
$page_title = "Login";
require_once 'resources/templates/header.php';

?>

<div class="container h-75">
    <div class="row h-100 justify-content-center" id="login_row">
        <form class="col-9 my-auto p-4 rounded bg-light" id="login_form" action="includes/login.inc.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="font-weight-bold">LOGIN</h3>
                    <hr class="bg-dark">
                </div>
                <div class="col-md-8">
                    <?php
                    if (isset($_GET["error"])) {
                        if($_GET["error"] === "empty_input") {
                            echo "<h4 class='text-info text-right'>FILL IN ALL FIELDS!</h4>";
                        } else if($_GET["error"] === "invalid_user") {
                            echo "<h4 class='text-info text-right'>INVALID USERNAME/EMAIL!</h4>";
                        } else if($_GET["error"] === "invalid_password") {
                            echo "<h4 class='text-info text-right'>YOUR PASSWORD WAS INCORRECT, RETRY!</h4>";
                        } else if($_GET["error"] === "none") {
                            echo "<h4 class='text-success text-right'>YOU HAVE SUCCESSFULLY SIGNED UP!<br>PLEASE LOG IN...</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="form-group col-lg mx-auto">
                <label for="name">Username/Email :</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your Username/Email *">
            </div>
            <div class="form-group col-lg mx-auto">
                <label for="password">Password :</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter your Password *">
            </div>
            <div class="form-group col-lg mx-auto">
                <input class="btn btn-danger float-right" type="submit" name="submit" value="LOGIN">
            </div>
        </form>
    </div>
</div>

<?php
require_once 'resources/templates/footer.php';
?>
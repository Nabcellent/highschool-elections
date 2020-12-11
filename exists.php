<?php
include 'functions.php';
$db_link = connect_to_db();

if(isset($_POST["signup_email"])) {
    $sql = "SELECT * FROM users_tbl WHERE user_email = '".$_POST["signup_email"]."'";
    $result = mysqli_query($db_link, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
} else if(isset($_POST["new_email"])) {
    $sql = "SELECT * FROM users_tbl WHERE user_email = '" . $_POST["new_email"] . "'";
    $result = mysqli_query($db_link, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
} else if(isset($_POST["new_username"])) {
    $sql = "SELECT * FROM users_tbl WHERE username = '" . $_POST["new_username"] . "'";
    $result = mysqli_query($db_link, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
}
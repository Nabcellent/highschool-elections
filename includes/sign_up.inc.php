<?php
include_once "../functions.php";
$db_link = connect_to_db();

if(isset($_POST["signup_email"])) {
    $sql = "SELECT * FROM users_tbl WHERE user_email = '".$_POST["signup_email"]."'";
    $result = mysqli_query($db_link, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
}

if (isset($_POST["submit"])) {
    $admin_level = $_POST["admin_level"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $last_name . $first_name;
    $email = $_POST["signup_email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(empty_input_sign_up($admin_level, $first_name, $last_name, $email, $password, $password_confirm) !== false) {
        header("location: ../sign_up.php?error=empty_input");
        exit();
    }

    if(password_match($password, $password_confirm) !== false) {
        header("location: ../sign_up.php?error=passwords_not_matching");
        exit();
    }

    if(email_exists($db_link, $username, $email) !== false) {
        header("location: ../sign_up.php?error=email_taken");
        exit();
    }

    create_user($db_link, $admin_level, $first_name, $last_name, $username, $email, $password);

} else {
    header("location: ../sign_up.php");
    exit();
}

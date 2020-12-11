<?php
include_once "../functions.php";
$db_link = connect_to_db();

if(isset($_POST["submit"])) {
    $username = $_POST["name"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(empty_input_login($username, $password) !== false) {
        header("location: ../login.php?error=empty_input");
        exit();
    }

    login_user($db_link, $username, $password);

} else {
    header("location: ../login.php");
    exit();
}
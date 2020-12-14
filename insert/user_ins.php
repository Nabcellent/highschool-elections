<?php
include_once "../functions.php";
$link = connect_to_db();

if(count($_POST) > 0 && $_POST['type'] === "1") {
    $user_id = $_POST['user_id_e'];
    $user_first_name = ucfirst($_POST['user_first_name_e']);
    $user_last_name = ucfirst($_POST['user_last_name_e']);
    $username = strtolower($_POST['user_username_e']);
    $user_class = $_POST['user_class_e'];
    $user_gender = $_POST['user_gender_e'];
    $user_email = $_POST['user_email_e'];
    $user_pass = $_POST["user_pass_e"];

    if(empty($_POST['user_pass_e'])) {
        $user_pass = "E2020";
    }

    $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

    $sql = "UPDATE users_tbl SET user_first_name = '$user_first_name', user_last_name = '$user_last_name', username = '$username',
            user_class = '$user_class', user_gender = '$user_gender', user_email = '$user_email', user_password = '$hashed_password'
            WHERE user_id = '$user_id'";

    if (mysqli_query($link, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] === "2") {
    $user_id = $_POST['user_id_d'];

    $sql = "DELETE FROM users_tbl WHERE user_id = '$user_id'";

    if (mysqli_query($link, $sql)) {
        echo $user_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 3) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users_tbl WHERE user_id in ($user_id)";

    if (mysqli_query($link, $sql)) {
        echo $user_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}
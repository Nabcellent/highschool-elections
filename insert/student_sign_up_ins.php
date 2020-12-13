<?php

include "../functions.php";
$link = connect_to_db();

$user_type = "student";
$user_first_name = ucfirst($_POST['first_name']);
$user_last_name = ucfirst($_POST['last_name']);
$username = strtolower($user_last_name . $user_first_name);
$user_class = $_POST['students_class'];
$user_gender = $_POST['gender'];
$user_email = $_POST["signup_email"];
$user_password = $_POST["password"];

$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_class) && !empty($user_gender) && !empty($user_email) && !empty($user_password)) {
    $sql = "INSERT INTO users_tbl (user_type, user_first_name, user_last_name, username, user_class, user_gender, user_email, user_password)
        VALUES ('$user_type', '$user_first_name', '$user_last_name', '$username', '$user_class', '$user_gender', '$user_email', '$hashed_password')";

    if(mysqli_query($link, $sql)) {
        echo "success";
    } else {
        echo "error" . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "KINDLY FILL IN ALL FIELDS!";
}
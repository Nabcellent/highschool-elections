<?php
include 'functions.php';
$link = connect_to_db();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $last_name . $first_name;
$email = $username . "@gmail.com";
$students_class = $_POST['class_name'];
$students_gender = $_POST['student_gender'];
$password = 'E2020';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(true) {
    $query = "SELECT username FROM users_tbl WHERE username = '$username'";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result)) {
        // row not found, do stuff...
        echo "Sorry, username exists";
    } else {
        // do other stuff...
        $user_sql = "INSERT INTO users_tbl (user_id, user_type, user_first_name, user_last_name, username, user_class, user_gender, user_email, user_password)
            VALUES (NULL, 'student', '$first_name', '$last_name', '$username', '$students_class', '$students_gender', '$email', '$hashed_password')";

        /*mysqli_query($link, $student_sql);*/
        mysqli_query($link, $user_sql);

        echo "DATA INSERTED";
    }
    mysqli_close($link);
} else {
    echo "ERROR! SOMETHING WENT WRONG";
}

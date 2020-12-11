<?php
include_once "../functions.php";
$link = connect_to_db();

if(count($_POST) > 0 && $_POST['type'] == 1) {
    $user_type = "student";
    $user_first_name = ucfirst($_POST['first_name']);
    $user_last_name = ucfirst($_POST['last_name']);
    $username = strtolower($user_last_name . $user_first_name);
    $user_class = $_POST['students_class'];
    $user_gender = $_POST['gender'];
    $user_email = $username . ".elec@gmail.com";
    $user_password = "E2020";

    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_class) && !empty($user_gender)) {
        $sql = "INSERT INTO users_tbl (user_type, user_first_name, user_last_name, username, user_class, user_gender, user_email, user_password)
        VALUES ('$user_type', '$user_first_name', '$user_last_name', '$username', '$user_class', '$user_gender', '$user_email', '$hashed_password')";

        if(mysqli_query($link, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);
    } else {
        echo "KINDLY FILL IN ALL FIELDS!";
    }
}

if(count($_POST) > 0 && $_POST['type'] == 2) {
    $user_id = $_POST['student_id'];
    $user_first_name = ucfirst($_POST['first_name']);
    $user_last_name = ucfirst($_POST['last_name']);
    $username = strtolower($user_last_name . $user_first_name);
    $user_class = $_POST['students_class'];
    $user_gender = $_POST['gender'];
    $user_email = $username . "elec@gmail.com";

    $sql = "UPDATE users_tbl SET user_first_name = '$user_first_name', user_last_name = '$user_last_name',
            user_class = '$user_class', user_gender = '$user_gender', username = '$username', user_email = '$user_email'
            WHERE user_id = '$user_id'";

    if (mysqli_query($link, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 3) {
    $user_id = $_POST['student_id'];

    $sql = "DELETE FROM users_tbl WHERE user_id = '$user_id'";

    if (mysqli_query($link, $sql)) {
        echo $user_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 4) {
    $user_id = $_POST['student_id'];
    $sql = "DELETE FROM users_tbl WHERE user_id in ($user_id)";

    if (mysqli_query($link, $sql)) {
        echo $user_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}
<?php
include_once "../functions.php";
$link = connect_to_db();

if($_POST["edit_type"] == "confirm_old_pass") {
    $old_pass_id = $_POST["old_pass_id"];
    $old_pass = $_POST["old_pass"];

    if(!empty($old_pass)) {
        $sql = "SELECT * FROM users_tbl WHERE user_id = '$old_pass_id'";
        $res = mysqli_fetch_assoc(mysqli_query($link, $sql));

        $hashed_password = $res["user_password"];

        if(password_verify($old_pass, $hashed_password)) {
            echo 'Correct';
        } else {
            echo 'Incorrect';
        }
    }

} else if($_POST["edit_type"] == "edit_password") {
    $new_pass_id = $_POST["new_pass_id"];
    $new_pass = $_POST["new_pass"];
    $new_pass_confirm = $_POST["new_pass_confirm"];
    $new_hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);

    if(!empty($new_pass) && !empty($new_pass_confirm)) {
        $sql = "UPDATE users_tbl SET user_password = '$new_hashed_pass' WHERE user_id = '$new_pass_id'";

        if(mysqli_query($link, $sql)) {
            echo 'Password changed successfully!';
        } else {
            echo "Unable to change password, Please contact your Administrator @Lè_•Çapuchôn✓🩸";
        }
    } else {
        echo "Kindly fill in all fields";
    }

} else if($_POST["edit_type"] == "edit_username") {
    $user_id = $_POST["user_id"];
    $new_username = $_POST["new_username"];

    if(!empty($new_username) && !empty($user_id)) {
        $sql = "UPDATE users_tbl SET username = '$new_username' WHERE user_id = '$user_id'";

        if(mysqli_query($link, $sql)) {
            echo 'Username changed successfully!';
        } else {
            echo "Unable to change Username, Please contact your Administrator @Lè_•Çapuchôn✓🩸";
        }
    } else {
        echo "Kindly input a new username!";
    }

} else if($_POST["edit_type"] == "edit_email") {
    $user_id = $_POST["user_id"];
    $new_email = $_POST["email"];

    if(!empty($new_email) && !empty($user_id)) {
        $sql = "UPDATE users_tbl SET user_email = '$new_email' WHERE user_id = '$user_id'";

        if(mysqli_query($link, $sql)) {
            echo 'Email changed successfully!';
        } else {
            echo "Unable to change email, Please contact your Administrator @Lè_•Çapuchôn✓🩸";
        }
    } else {
        echo "Kindly input a new username!";
    }
}


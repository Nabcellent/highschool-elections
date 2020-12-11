<?php
function empty_input_sign_up($admin_level, $first_name, $last_name, $email, $password, $password_confirm) {
    if(empty($admin_level) || empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($password_confirm)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function password_match($password, $password_confirm) {
    if($password !== $password_confirm) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function email_exists($db_link, $username, $email) {
    $sql = "SELECT * FROM users_tbl WHERE username = ? OR user_email = ?;";
    $statement = mysqli_stmt_init($db_link);

    if(!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../sign_up.php?error=statement_failed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $username, $email);
    mysqli_stmt_execute($statement);

    $result_data = mysqli_stmt_get_result($statement);

    if($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($statement);
}

function create_user($db_link, $admin_level, $first_name, $last_name, $username, $email, $password) {
    $user_class = 0;
    $user_gender = '-';
    $sql = "INSERT INTO users_tbl (user_type, user_first_name, user_last_name, username, user_class, user_gender, user_email, user_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = mysqli_stmt_init($db_link);

    if(!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../sign_up.php?error=statement_failed");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement, "ssssssss", $admin_level, $first_name, $last_name, $username, $user_class, $user_gender, $email, $hashed_password);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("location: ../login.php?error=none");
    exit();
}

function empty_input_login($username, $password) {
    if(empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function login_user($db_link, $username, $password) {
    $email_exists = email_exists($db_link, $username, $username);

    if($email_exists === false) {
        header("location: ../login.php?error=invalid_user");
        exit();
    }

    $hashed_password = $email_exists["user_password"];
    $password_check = password_verify($password, $hashed_password);

    if($password_check === false) {
        header("location: ../login.php?error=invalid_password");
        exit();
    } else if($password_check === true) {
        session_start();

        $_SESSION['userId'] = $email_exists['user_id'];
        $_SESSION['userType'] = $email_exists['user_type'];
        $_SESSION['userFirstName'] = $email_exists['user_first_name'];
        $_SESSION['userLastName'] = $email_exists['user_last_name'];
        $_SESSION['userUsername'] = $email_exists['username'];
        $_SESSION['userClass'] = $email_exists['user_class'];
        $_SESSION['userGender'] = $email_exists['user_gender'];
        $_SESSION['userEmail'] = $email_exists['user_email'];

        header("location: ../index.php");
        exit();
    }
}
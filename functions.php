<?php
require "resources/db_config.php";

$link = connect_to_db();

//  Check for session
function check_session() {
    if(!isset($_SESSION["userEmail"])) {
        header("location: ../login.php");
    }
}

////    GET DATABASE DETAILS    ////////////////////////////////////////////////////////////////////////////////////////

function get_classes_details() {
    $link = connect_to_db();
    $query = mysqli_query($link, "SELECT * FROM classes_tbl WHERE form_number != 0 ORDER BY form_number, stream_name");
    $classes_arr = array();

    while($row = mysqli_fetch_array($query)) {
        $classes_arr[] = $row;
    }

    return $classes_arr;
}

function get_student_sign_up_class() {
    $link = connect_to_db();
    $sql = "SELECT classes_tbl.*, users_tbl.user_class,
            COUNT(user_class)
            FROM classes_tbl
            INNER JOIN users_tbl ON classes_tbl.class_id = users_tbl.user_class
            WHERE class_id != 0
            GROUP BY class_id
            HAVING COUNT(user_class) < 7
            ORDER BY form_number, stream_name";
    $res = mysqli_query($link, $sql);
    $classes_arr = array();

    while($row = mysqli_fetch_array($res)) {
        $classes_arr[] = $row;
    }

    return $classes_arr;
}

function get_nominee_class($form_number) {
    $link = connect_to_db();
    $query = mysqli_query($link, "SELECT * FROM classes_tbl WHERE form_number = '$form_number' ORDER BY stream_name");
    $classes_arr = array();

    while($row = mysqli_fetch_array($query)) {
        $classes_arr[] = $row;
    }

    return $classes_arr;
}

function get_positions_details($form_number) {
    $link = connect_to_db();

    if($form_number == "1" || $form_number == "2" || $form_number == "4") {
        $query = mysqli_query($link, "SELECT * FROM positions_tbl WHERE position_eligibility = 1234 ORDER BY position_level");
    } else {
        $query = mysqli_query($link, "SELECT * FROM positions_tbl ORDER BY position_level");
    }

    $table_rows = array();

    while($row = mysqli_fetch_array($query)) {
        $table_rows[] = $row;
    }

    return $table_rows;
}

function get_class_lvl_candidates($class_id) {
    $link = connect_to_db();
    $candidates = array();

    $sql = "SELECT nominators_tbl.nominee_id,
       nominators_tbl.nominee_class_id,
       users_tbl.user_first_name,
       users_tbl.user_last_name,
       classes_tbl.form_number,
       classes_tbl.stream_name,
       positions_tbl.position_name,
       COUNT(nominators_tbl.nominee_id)
    FROM nominators_tbl
    INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE nominators_tbl.nominee_class_id = '$class_id' AND position_name = 'class prefect'
    GROUP BY nominee_id
    HAVING COUNT(nominators_tbl.nominee_id) > 0";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            $candidates[] = $row;
        }
    }

    return $candidates;
}

function get_form_lvl_candidates($form_number) {
    $link = connect_to_db();
    $candidates = array();

    $sql = "SELECT nominators_tbl.nominee_id,
       nominators_tbl.nominee_class_id,
       users_tbl.user_first_name,
       users_tbl.user_last_name,
       classes_tbl.form_number,
       classes_tbl.stream_name,
       positions_tbl.position_name,
    COUNT(nominators_tbl.nominee_id)
    FROM `nominators_tbl`
    INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE form_number = '$form_number' AND position_name = 'form captain'
    GROUP BY nominee_id
    HAVING COUNT(nominators_tbl.nominee_id) > 1";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            $candidates[] = $row;
        }
    }

    return $candidates;
}

function get_sch_lvl_candidates($position) {
    $link = connect_to_db();
    $candidates = array();

    $sql = "SELECT nominators_tbl.nominee_id,
       nominators_tbl.nominee_class_id,
       users_tbl.user_first_name,
       users_tbl.user_last_name,
       classes_tbl.form_number,
       classes_tbl.stream_name,
       positions_tbl.position_name,
    COUNT(nominators_tbl.nominee_id)
    FROM `nominators_tbl`
    INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE position_name = '$position'
    GROUP BY nominee_id
    HAVING COUNT(nominators_tbl.nominee_id) > 1";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            $candidates[] = $row;
        }
    }

    return $candidates;
}




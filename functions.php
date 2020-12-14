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

function get_nominees($position) {
    $link = connect_to_db();

    $sql = "SELECT nominators_tbl.nominee_id,
	nominator.user_first_name AS nominator_firstname,
	nominator.user_last_name AS nominator_lastname,
	nominee.user_first_name AS nominee_firstname,
    nominee.user_last_name AS nominee_lastname,
    classes_tbl.form_number AS nominee_formnumber,
    classes_tbl.stream_name AS nominee_streamname,
    positions_tbl.position_name
    FROM `nominators_tbl`
    INNER JOIN users_tbl AS nominee ON nominators_tbl.nominee_id = nominee.user_id
    INNER JOIN users_tbl AS nominator ON nominators_tbl.student_id = nominator.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE position_name = '$position'
    GROUP BY nominee_firstname, nominee_lastname, form_number, stream_name
    ORDER BY form_number, stream_name";

    $nominees = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);

    $nom = array();
    $child_row = 1;

    foreach($nominees as $nominee) {
        $nom[] = '<tr id="parent_row" class="parent_row">
                    <td>' . $nominee["nominee_firstname"] . '</td>
                    <td>' . $nominee["nominee_lastname"] . '</td>
                    <td>' . $nominee["nominee_formnumber"] . " " . $nominee["nominee_streamname"] . '</td>
                  </tr>';
        $nominee_id = $nominee["nominee_id"];

        $nominator_sql = "SELECT nominators_tbl.nominee_id,
						nominators_tbl.student_id,
                        nominators_tbl.nominator_type,
                        users_tbl.user_first_name AS nominator_firstname,
                        users_tbl.user_last_name AS nominator_lastname
                        FROM `nominators_tbl`
                        INNER JOIN users_tbl ON nominators_tbl.student_id = users_tbl.user_id
                        WHERE nominee_id = '$nominee_id'
                        ORDER BY nominator_type, nominator_lastname";
        $nominators = mysqli_fetch_all(mysqli_query($link, $nominator_sql), MYSQLI_ASSOC);

        foreach($nominators as $nominator) {
            $nom[] = '<tr class="child_row">
                        <td class="p-0" colspan="3">
                        <div class="row child_div">
                            <div class="col sibling">
                                <p>' . $nominator["nominator_firstname"] . " " . $nominator["nominator_lastname"] . '</p>
                            </div>
                            <div class="col-6 sibling">
                                <p>' . $nominator["nominator_type"] . '</p>
                            </div>
                        </div>
                        </td>
                      </tr>';
        }
        $child_row++;
    }

    return $nom;
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
    HAVING COUNT(nominators_tbl.nominee_id) = 3";

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
    HAVING COUNT(nominators_tbl.nominee_id) = 7";

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
    HAVING COUNT(nominators_tbl.nominee_id) = 7";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            $candidates[] = $row;
        }
    }

    return $candidates;
}

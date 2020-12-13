<?php
include '../functions.php';
$link = connect_to_db();

$nominator_id = $_POST['nominator_id'];
$pos = $_POST['position'];
$nominee_class = $_POST['nominee_class'];

if (isset($_POST['position'])) {
    $pos_qry = "SELECT * FROM positions_tbl WHERE position_id = '$pos'";
    $pos_res = mysqli_fetch_array(mysqli_query($link, $pos_qry));
    $position_eligibility = $pos_res['position_eligibility'];
    $position_name = $pos_res['position_name'];

    if($position_name == "FORM CAPTAIN") {
        $student_name_qry = "SELECT users_tbl.user_id, users_tbl.user_first_name, users_tbl.user_last_name, classes_tbl.stream_name, classes_tbl.form_number
                FROM users_tbl
                INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
                WHERE user_id != '$nominator_id' AND user_type = 'student' AND classes_tbl.class_id = '$nominee_class'";
    } else if($position_name == "CLASS PREFECT") {
        $student_name_qry = "SELECT users_tbl.user_id, users_tbl.user_first_name, users_tbl.user_last_name, classes_tbl.form_number, classes_tbl.stream_name
                FROM users_tbl
                INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
                WHERE user_id != '$nominator_id' AND user_type = 'student' AND classes_tbl.class_id = '$nominee_class'";
    } else if($position_name == "HEAD GIRL") {
        $student_name_qry = "SELECT users_tbl.user_id, users_tbl.user_first_name, users_tbl.user_gender, users_tbl.user_last_name, classes_tbl.form_number, classes_tbl.stream_name
                FROM users_tbl
                INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
                WHERE user_id != '$nominator_id' AND user_type = 'student' AND user_gender = 'F' AND classes_tbl.class_id = '$nominee_class'";
    } else if($position_eligibility == 3) {
        $student_name_qry = "SELECT users_tbl.user_id, users_tbl.user_first_name, users_tbl.user_last_name, classes_tbl.stream_name, classes_tbl.form_number, classes_tbl.class_id
                FROM users_tbl
                INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
                WHERE user_id != '$nominator_id' AND user_type = 'student' AND classes_tbl.class_id = '$nominee_class'
                ORDER BY classes_tbl.stream_name";
    }

    $res = mysqli_query($link, $student_name_qry);
    if (mysqli_num_rows($res) > 0) {
        echo "<option hidden>------- Select -------</option>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<option value='" . $row['user_id'] . "'>" . $row['user_first_name'] . " " . $row['user_last_name'] . "</option>";
        }
    }

} else {
    header('location: ./');
}


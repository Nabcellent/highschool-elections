<?php
include_once '../functions.php';
$link = connect_to_db();

$nominator_id = $_POST['nominator_id'];
$nominator_type = $_POST['nominator_type'];
$nominator_class = $_POST['nominator_class'];
$position_id= $_POST['position_id'];
$nominee_id = $_POST['nominee_id'];
$nominee_class = $_POST['nominee_class'];

//  Prevent a student from nominating more than 1 student for same position
$sql_same_pos = "SELECT * FROM nominators_tbl WHERE student_id = '" . $_POST["nominator_id"] . "' AND position_id = '" . $_POST["position_id"] . "'";
$res_Same_pos = mysqli_query($link, $sql_same_pos);

//  Prevent a student from nominating the same student for one position
$sql_same_student = "SELECT * FROM nominators_tbl WHERE student_id = '" . $_POST["nominator_id"] . "' AND nominee_id = '" . $_POST["nominee_id"] . "'";
$res_same_student = mysqli_query($link, $sql_same_student);

//  Prevent students from nomination one student for more than one position
$sql_diff_pos = "SELECT * FROM nominators_tbl WHERE nominee_id = '" . $_POST["nominee_id"] . "' AND position_id != '" . $_POST["position_id"] . "'";
$res_diff_pos = mysqli_query($link, $sql_diff_pos);

//  Check if form captain nominator is in different class
$sql_form_capt = "SELECT nominators_tbl.nominee_class_id, nominators_tbl.nominator_type, users_tbl.user_class
                    FROM nominators_tbl 
                    INNER JOIN users_tbl on nominators_tbl.student_id = users_tbl.user_id
                    WHERE users_tbl.user_class = '$nominator_class'";
$res_form_capt = mysqli_query($link, $sql_form_capt);

//  Check if a class prefect already has one proposer
$sql_CP_proposer = "SELECT * FROM nominators_tbl WHERE nominee_id = '" . $_POST["nominee_id"] . "' AND nominator_type = '$nominator_type'  AND position_id = 8";
$res_CP_proposer = mysqli_query($link, $sql_CP_proposer);

//  Count current proposers and seconders for a nominee
$sql_nominators_count = "SELECT *, COUNT(nominee_id) duplicates
                        FROM nominators_tbl
                        WHERE nominee_id = '$nominee_id' AND nominator_type = '$nominator_type'
                        GROUP BY nominee_id, nominator_type";
$count_res = mysqli_fetch_array(mysqli_query($link, $sql_nominators_count));


if(mysqli_num_rows($res_Same_pos) > 0) {
    echo "You have already nominated a student for this position!";
} else if(mysqli_num_rows($res_same_student) > 0) {
    echo "You CANNOT nominate the same student for 2 different positions!";
} else if(mysqli_num_rows($res_diff_pos) > 0) {
    echo "This student has already been nominated for a different position!";
} else if(isset($count_res["duplicates"])) {
    if($position_id == "8") {
        if(mysqli_num_rows($res_CP_proposer) > 0 && $nominator_type == "proposer") {
            echo "This student already has a proposer";
        } else if($nominator_type == "seconder" && $count_res["duplicates"] == "2") {
            echo "This student already has enough seconders";
        } else {
            addToDatabase();
        }
    } else if($position_id == "7" && mysqli_num_rows($res_form_capt) > 0 && $nominator_type == "seconder") {
        echo "This student already has a seconder from this class";
    } else if($nominator_type == "proposer" && $count_res["duplicates"] == "2") {
        echo "This student already has enough proposers";
    } else if($nominator_type == "seconder" && $count_res["duplicates"] == "5") {
        echo "This student already has enough seconders";
    } else {
        addToDatabase();
    }
} else {
    addToDatabase();
}

function addToDatabase() {
    global $link, $nominator_id, $nominator_type, $position_id, $nominee_id, $nominee_class;

    if(!empty($nominator_id) && !empty($nominator_type) && !empty($position_id) && !empty($nominee_id) && !empty($nominee_class)) {

        $query = "INSERT into nominators_tbl (nominator_id, student_id, nominee_id, nominee_class_id, nominator_type, position_id)
            VALUES (NULL, '$nominator_id', '$nominee_id', '$nominee_class', '$nominator_type', '$position_id')";

        if (mysqli_query($link, $query)) {
            echo "Your nomination was successful!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($link);
        }
    } else {
        echo "ERROR! OPERATION FAILED";
    }
}
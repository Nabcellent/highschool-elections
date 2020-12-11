<?php
include_once 'functions.php';
$link = connect_to_db();

$nominator_id = $_POST['nominator_id'];
$nominator_type = $_POST['nominator_type'];
$position_name= $_POST['position_name'];
$nominee_id = $_POST['nominee_id'];

if(!empty($nominator_id)) {
    $query = "INSERT into nominators_tbl (nominator_id, student_id, nominee_id, nominator_type, position_id)
            VALUES (NULL, '$nominator_id', '$nominee_id', '$nominator_type', '$position_name')";

    mysqli_query($link, $query);

    echo "NOMINATION SUCCESSFUL";
} else {
    echo "ERROR! OPERATION FAILED";
}
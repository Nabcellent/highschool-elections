<?php
include_once "../functions.php";
$link = connect_to_db();

$voter_id = $_POST['voter_id'];
$head_boy_id = $_POST['head_boy'];
$head_girl_id = $_POST['head_girl'];
$dh_capt_id = $_POST['dh_capt'];
$games_capt_id = $_POST['games_capt'];
$lib_capt_id = $_POST['lib_capt'];
$form_capt_id = $_POST['form_capt'];
$class_prefect_id = $_POST['class_prefect'];

//  Check if already voted
$sql_voted = "SELECT * FROM vote_tbl WHERE voter_id = '$voter_id'";
$res_voted = mysqli_query($link, $sql_voted);

if(mysqli_num_rows($res_voted) > 0) {
    echo "You CANNOT vote twice!";
} else {
    $sql = "INSERT INTO vote_tbl (voter_id, head_boy_id, head_girl_id, dh_capt_id, games_capt_id, lib_capt_id, form_capt_id, class_prefect_id)
            VALUES ('$voter_id', '$head_boy_id', '$head_girl_id', '$dh_capt_id', '$games_capt_id', '$lib_capt_id', '$form_capt_id', '$class_prefect_id')";

    if(mysqli_query($link, $sql)) {
        echo "You have Voted Successfully!";
    } else {
        echo "ERROR IN VOTING! \nPlease contact your Administrator @Lè_•Çapuchôn✓🩸";
    }
}
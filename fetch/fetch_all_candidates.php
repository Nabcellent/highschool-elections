<?php
include "fetch_candidates.php";

$positions = array('head_boy_id', 'head_girl_id', 'dh_capt_id', 'games_capt_id', 'lib_capt_id');

$result = array();

foreach($positions as $position) {
    $result[] = get_results($position);
}

echo json_encode($result);
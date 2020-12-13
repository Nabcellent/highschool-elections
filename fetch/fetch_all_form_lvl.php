<?php
include "fetch_candidates.php";

$positions = array(1, 2, 3, 4);

$result = array();

foreach ($positions as $position) {
    $result[] = get_results($position, "form_level");
}

echo json_encode($result);
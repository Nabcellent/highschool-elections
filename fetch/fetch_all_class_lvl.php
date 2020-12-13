<?php
include "fetch_candidates.php";

$positions = array(
    array(1, "earth"),
    array(1, "jupiter"),
    array(1, "mars"),
    array(1, "neptune"),
    array(1, "venus")
);

$result = array();

foreach ($positions as $position) {
    $result[] = get_results($position, "form_level");
}

echo json_encode($result);
<?php
include "fetch_candidates.php";

$positions = array(
    array(1, "earth"),
    array(1, "jupiter"),
    array(1, "mars"),
    array(1, "neptune"),
    array(1, "venus"),

    array(4, "earth"),
    array(4, "jupiter"),
    array(4, "mars"),
    array(4, "neptune"),
    array(4, "venus"),

    array(2, "earth"),
    array(2, "jupiter"),
    array(2, "mars"),
    array(2, "neptune"),
    array(2, "venus"),

    array(3, "earth"),
    array(3, "jupiter"),
    array(3, "mars"),
    array(3, "neptune"),
    array(3, "venus")
);

$result = array();

foreach ($positions as $position) {
    $result[] = get_results($position, "class_level");
}

echo json_encode($result);
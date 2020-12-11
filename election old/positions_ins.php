<?php
include "functions.php";
$link = connect_to_db();

$position_name = strtoupper($_POST['name']);
$position_level = $_POST['level'];
$position_eligibility = $_POST['eligibility'];

$chk = "";
foreach ($position_eligibility as $chk1) {
    $chk .= $chk1;
}

if(true) {
    $sql = "INSERT INTO `positions_tbl` (`position_id`, `position_name`, `position_level`, `position_eligibility`) 
            VALUES (NULL, '$position_name', '$position_level', '$chk')";
    mysqli_query($link, $sql);

    echo "DATA INSERTED";
} else {
    echo "ERROR! OPERATION FAILED";
}

<?php
include_once "../functions.php";
$link = connect_to_db();

if((count($_POST) > 0) && $_POST['type'] == 1) {
    $pos_name = strtoupper($_POST['position_name']);
    $pos_level = $_POST['position_level'];
    $pos_eligibility = $_POST['eligibility'];

    if(!empty($pos_name) && !empty($pos_level) && !empty($pos_eligibility)) {
        $chk = "";
        foreach ($pos_eligibility as $chk1) {
            $chk .= $chk1;
        }

        $sql = "INSERT INTO `positions_tbl`( `position_name`, `position_level`,`position_eligibility`) 
        VALUES ('$pos_name','$pos_level','$chk')";

        if (mysqli_query($link, $sql)) {
            echo json_encode(array("statusCode"=>200));
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);
    } else {
        echo"KINDLY FILL IN ALL FIELDS!";
    }
}

if((count($_POST) > 0) && $_POST['type'] == 2) {
    $pos_id = $_POST['position_id'];
    $pos_name = strtoupper($_POST['position_name']);
    $pos_level = $_POST['position_level'];
    $pos_eligibility = $_POST['eligibility'];

    $chk = "";
    foreach ($pos_eligibility as $chk1) {
        $chk .= $chk1;
    }

    $sql = "UPDATE `positions_tbl` SET `position_name`='$pos_name',`position_level`='$pos_level',`position_eligibility`='$chk' 
    WHERE position_id = $pos_id";

    if (mysqli_query($link, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 3) {
    $pos_id = $_POST['position_id'];
    $sql = "DELETE FROM `positions_tbl` WHERE position_id = $pos_id ";

    if (mysqli_query($link, $sql)) {
        echo $pos_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 4) {
    $pos_id = $_POST['position_id'];

    $sql = "DELETE FROM positions_tbl WHERE position_id in ($pos_id)";

    if (mysqli_query($link, $sql)) {
        echo $pos_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

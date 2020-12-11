<?php
include_once "../functions.php";
$link = connect_to_db();

if((count($_POST) > 0) && $_POST['type'] == 1) {
    $form_number = $_POST['form_number'];
    $stream_name = strtoupper($_POST['stream_name']);

    if(!empty($form_number) && !empty($stream_name)) {
        $sql = "INSERT INTO `classes_tbl`(form_number, stream_name) 
        VALUES ('$form_number','$stream_name')";

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
    $class_id = $_POST['class_id'];
    $form_number = $_POST['form_number'];
    $stream_name = strtoupper($_POST['stream_name']);

    $sql = "UPDATE classes_tbl SET form_number = '$form_number', stream_name = '$stream_name' WHERE class_id = '$class_id'";

    if (mysqli_query($link, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 3) {
    $class_id = $_POST['class_id'];
    $sql = "DELETE FROM classes_tbl WHERE class_id = '$class_id' ";

    if (mysqli_query($link, $sql)) {
        echo $class_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}

if((count($_POST) > 0) && $_POST['type'] == 4) {
    $class_id = $_POST['class_id'];
    $sql = "DELETE FROM classes_tbl WHERE class_id in ($class_id)";

    if (mysqli_query($link, $sql)) {
        echo $class_id;
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}


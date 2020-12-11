<?php
include 'functions.php';
$link = connect_to_db();

$class_name = $_POST['class_name'];
$stream_name = $_POST['stream_name'];

$name_length = strlen($class_name);
$stream_length = strlen($stream_name);

if($name_length < 1 || $stream_length < 1) {
    echo "Please key in all details!";
} elseif ($stream_length > 0 && $name_length > 0) {
    $sql = "INSERT INTO `classes_tbl` (`class_id`, `form_number`, `stream_name`) VALUES (NULL, '$class_name', '$stream_name')";
    mysqli_query($link, $sql);

    echo "DATA INSERTED";
} else {
    echo "ERROR! OPERATION FAILED";
}
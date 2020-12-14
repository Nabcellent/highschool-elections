<?php
include_once "../resources/db_config.php";

$link = connect_to_db();

$student_class_id = $_POST['student_class_id'];

$sql = "SELECT users_tbl.user_first_name,
        users_tbl.user_last_name,
        users_tbl.user_gender,
        classes_tbl.form_number,
        classes_tbl.stream_name
        FROM users_tbl
        INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
        WHERE class_id = '$student_class_id'
        ORDER BY form_number, stream_name, user_first_name";

$result = mysqli_query($link, $sql);

$data = array();

while($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

if(mysqli_num_rows($result) < 1) {
    echo "<h4 class='mt-4 text-info'>You Don't have a classmate yet!</h4>";
} else {
    $i = 1;

    foreach($data as $row) {
        $classmate_first_name = $row["user_first_name"];
        $classmate_last_name = $row["user_last_name"];
        $classmate_form = $row["form_number"];
        $classmate_stream = $row["stream_name"];
        $classmate_gender = $row["user_gender"];

        if($row["user_gender"] === "M") {
            $classmate_gender = "Male";
        } else {
            $classmate_gender = "Female";
        }

        echo '<div class="row pl-3 text-left">
                <div class="col-md-3">
                    <p>' . $i . ". &nbsp;&nbsp; " . $classmate_first_name . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . $classmate_last_name . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . $classmate_form . " " . $classmate_stream . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . $classmate_gender . '</p>
                </div>
            </div>';
        $i++;
    }
}

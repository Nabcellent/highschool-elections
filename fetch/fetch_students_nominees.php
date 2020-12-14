<?php
include_once "../resources/db_config.php";

$link = connect_to_db();

$student_id = $_POST['student_id'];

$sql = "SELECT positions_tbl.position_name,
        users_tbl.user_first_name,
        users_tbl.user_last_name,
        users_tbl.user_gender,
        classes_tbl.form_number,
        classes_tbl.stream_name
        FROM nominators_tbl
        INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
        INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
        INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
        WHERE student_id = '$student_id'
        ORDER BY form_number, stream_name, user_first_name";
$result = mysqli_query($link, $sql);

$data = array();

while($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

if(mysqli_num_rows($result) < 1) {
    echo "<h4 class='mt-4 text-info'>You haven't nominated anyone yet!</h4>";
} else {
    foreach($data as $row) {
        $nominee_first_name = $row["user_first_name"];
        $nominee_last_name = $row["user_last_name"];
        $nominee_form = $row["form_number"];
        $nominee_stream = $row["stream_name"];
        $nominee_position = $row["position_name"];

        if($row["user_gender"] === "M") {
            $nominee_gender = "Male";
        } else {
            $nominee_gender = "Female";
        }

        echo '<div class="row">
                <div class="col-md-3">
                    <p>' . $nominee_first_name . " " . $nominee_last_name . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . $nominee_form . " " . $nominee_stream . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . $nominee_gender . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . $nominee_position . '</p>
                </div>
            </div>';
    }
}

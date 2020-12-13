<?php
include_once "../resources/db_config.php";

function get_results($position) {
    $link = connect_to_db();

    $sql = "SELECT " . $position . ", users_tbl.user_first_name, users_tbl.user_last_name,
        COUNT(*) AS total
        FROM vote_tbl
        INNER JOIN users_tbl ON " . $position . " = users_tbl.user_id
        GROUP BY " . $position . "";

    $result = mysqli_query($link, $sql);

    $data = array();

    while($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }

    $total_votes = 0;
    foreach($data as $row) {
        $total_votes += $row["total"];
    }

    $result = array();

    foreach($data as $row) {
        $percentage_vote = round(($row["total"]/$total_votes) * 100);

        if($percentage_vote >= 40) {
            $progress_bar_class = "bg-success";
        } else if($percentage_vote >= 25 && $percentage_vote < 40) {
            $progress_bar_class = "bg-info";
        } else if($percentage_vote >= 10 && $percentage_vote < 25){
            $progress_bar_class = "bg-warning";
        } else {
            $progress_bar_class = "bg-danger";
        }

        $result[] = "<div class='row'>
        <div class='col-md-3'>
            <label>" . $row["user_first_name"] . " " . $row["user_last_name"] . "</label>    
        </div>
        <div class='col-md-9'>
            <div class='progress'>
                <div class='progress-bar " . $progress_bar_class . "' role='progressBar' aria-valuenow=" . $percentage_vote . " aria-valuemin='0' aria-valuemax='100' style='width: " . $percentage_vote . "%'>
                    " . $percentage_vote . " %
                </div>
            </div>
        </div>
    </div>";
    }

    return $result;
}

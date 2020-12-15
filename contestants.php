<?php
$page_title = "Contestants";

require_once 'resources/templates/header.php';

check_session();

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col" id="contestants_div">
                <div class="text-center">
                    <button id="all_all" class="btn btn-primary m-3 align-center">VIEW NOMINATORS</button>
                    <a href="#view_candidates" class="btn btn-dark" data-toggle="modal">VIEW CANDIDATES!</a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>CLASS PREFECT</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table id="cp_tbl" class="table table-hover table-fixed">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('CLASS PREFECT');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>HEAD BOY</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('head boy');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>HEAD GIRL</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead"><table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('head girl');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>DINING HALL CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('dining hall captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>GAMES CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('games captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>LIBRARY CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('library captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>FORM CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('form captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    Contestants Form Modal   -->
    <div id="view_candidates" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h3 class="modal-title font-weight-bolder">CANDIDATES</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body text-black">
                    <div class="row justify-content-center">
                        <div class="col-md-12 bg-light">
                            <h4 class="font-weight-bold text-center">SCHOOL LEVEL</h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h5>Head Boys</h5>
                            <ol>
                                <?= get_sch_candidates('head boy') ?>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5>Head Girls</h5>
                            <ol>
                            <?= get_sch_candidates('head girl') ?>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h5>Dinning Hall Captains</h5>
                            <ol>
                            <?= get_sch_candidates('dining hall captain') ?>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <h5>Games Captains</h5>
                            <ol>
                            <?= get_sch_candidates('games captain') ?>
                            </ol>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <h5>Library Captains</h5>
                            <ol>
                            <?= get_sch_candidates('library captain') ?>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 bg-light">
                            <h4 class="font-weight-bold text-center">FORM LEVEL</h4>
                        </div>
                    </div>
                    <hr class="bg-light mt-0 mb-0">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h5>Form 1</h5>
                            <ol>
                            <?= get_form_candidates(1) ?>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5>Form 2</h5>
                            <ol>
                            <?= get_form_candidates(2) ?>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h5>Form 3</h5>
                            <ol>
                            <?= get_form_candidates('3') ?>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5>Form 4</h5>
                            <ol>
                            <?= get_form_candidates('4') ?>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 bg-light">
                            <h4 class="font-weight-bold text-center">CLASS LEVEL</h4>
                        </div>
                    </div>
                    <hr class="bg-light mt-0 mb-0">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h5>Form 1</h5>
                            <ol>
                            <?= get_class_candidates(1) ?>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5>Form 2</h5>
                            <ol>
                            <?= get_class_candidates(2) ?>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h5>Form 3</h5>
                            <ol>
                            <?= get_class_candidates(3) ?>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5>Form 4</h5>
                            <ol>
                            <?= get_class_candidates(4) ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="CLOSE">
                </div>
            </div>
        </div>
    </div>

<?php


function get_nominees($position) {
    $link = connect_to_db();

    $sql = "SELECT nominators_tbl.nominee_id,
	nominator.user_first_name AS nominator_firstname,
	nominator.user_last_name AS nominator_lastname,
	nominee.user_first_name AS nominee_firstname,
    nominee.user_last_name AS nominee_lastname,
    classes_tbl.form_number AS nominee_formnumber,
    classes_tbl.stream_name AS nominee_streamname,
    positions_tbl.position_name
    FROM `nominators_tbl`
    INNER JOIN users_tbl AS nominee ON nominators_tbl.nominee_id = nominee.user_id
    INNER JOIN users_tbl AS nominator ON nominators_tbl.student_id = nominator.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE position_name = '$position'
    GROUP BY nominee_firstname, nominee_lastname, form_number, stream_name
    ORDER BY form_number, stream_name";

    $nominees = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);

    $nom = array();
    $child_row = 1;

    foreach($nominees as $nominee) {
        $nom[] = '<tr id="parent_row" class="parent_row">
                    <td>' . $nominee["nominee_firstname"] . '</td>
                    <td>' . $nominee["nominee_lastname"] . '</td>
                    <td>' . $nominee["nominee_formnumber"] . " " . $nominee["nominee_streamname"] . '</td>
                  </tr>';
        $nominee_id = $nominee["nominee_id"];

        $nominator_sql = "SELECT nominators_tbl.nominee_id,
						nominators_tbl.student_id,
                        nominators_tbl.nominator_type,
                        users_tbl.user_first_name AS nominator_firstname,
                        users_tbl.user_last_name AS nominator_lastname
                        FROM `nominators_tbl`
                        INNER JOIN users_tbl ON nominators_tbl.student_id = users_tbl.user_id
                        WHERE nominee_id = '$nominee_id'
                        ORDER BY nominator_type, nominator_lastname";
        $nominators = mysqli_fetch_all(mysqli_query($link, $nominator_sql), MYSQLI_ASSOC);

        foreach($nominators as $nominator) {
            $nom[] = '<tr class="child_row">
                        <td class="p-0" colspan="3">
                        <div class="row child_div">
                            <div class="col sibling">
                                <p>' . $nominator["nominator_firstname"] . " " . $nominator["nominator_lastname"] . '</p>
                            </div>
                            <div class="col-6 sibling">
                                <p>' . $nominator["nominator_type"] . '</p>
                            </div>
                        </div>
                        </td>
                      </tr>';
        }
        $child_row++;
    }

    return $nom;
}

function get_sch_candidates($position) {
    $link = connect_to_db();

    $sql = "SELECT nominators_tbl.nominee_id,
       nominators_tbl.nominee_class_id,
       users_tbl.user_first_name,
       users_tbl.user_last_name,
       classes_tbl.form_number,
       classes_tbl.stream_name,
       positions_tbl.position_name,
    COUNT(nominators_tbl.nominee_id)
    FROM `nominators_tbl`
    INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE position_name = '$position'
    GROUP BY nominee_id
    HAVING COUNT(nominators_tbl.nominee_id) > 2";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            echo "<li class='mb-0 text-white'>" . $row['user_first_name'] . " " . $row['user_last_name'] . " &nbsp; - &nbsp; " . $row['form_number'] . " " . $row['stream_name'] . "</li>";
        }
    } else {
        echo "<p class='text-light'>No candidate(s) yet</p>";
    }
}

function get_form_candidates($form_number) {
    $link = connect_to_db();

    $sql = "SELECT nominators_tbl.nominee_id,
       nominators_tbl.nominee_class_id,
       users_tbl.user_first_name,
       users_tbl.user_last_name,
       classes_tbl.form_number,
       classes_tbl.stream_name,
       positions_tbl.position_name,
    COUNT(nominators_tbl.nominee_id)
    FROM `nominators_tbl`
    INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE position_name = 'form captain' AND form_number = '$form_number'
    GROUP BY nominee_id
    HAVING COUNT(nominators_tbl.nominee_id) > 2";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            echo "<li class='mb-0 text-white'>" . $row['user_first_name'] . " " . $row['user_last_name'] . " &nbsp; - &nbsp; " . $row['form_number'] . " " . $row['stream_name'] . "</li>";
        }
    } else {
        echo "<p class='text-light'>No candidate(s) yet</p>";
    }
}

function get_class_candidates($form_number) {
    $link = connect_to_db();

    $sql = "SELECT nominators_tbl.nominee_id,
       nominators_tbl.nominee_class_id,
       users_tbl.user_first_name,
       users_tbl.user_last_name,
       classes_tbl.form_number,
       classes_tbl.stream_name,
       positions_tbl.position_name,
    COUNT(nominators_tbl.nominee_id)
    FROM `nominators_tbl`
    INNER JOIN users_tbl ON nominators_tbl.nominee_id = users_tbl.user_id
    INNER JOIN classes_tbl ON nominators_tbl.nominee_class_id = classes_tbl.class_id
    INNER JOIN positions_tbl ON nominators_tbl.position_id = positions_tbl.position_id
    WHERE position_name = 'class prefect' AND form_number = '$form_number'
    GROUP BY form_number, stream_name
    HAVING COUNT(nominators_tbl.nominee_id) > 0";

    $query = mysqli_query($link, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
            echo "<li class='mb-0 text-white'>" . $row['user_first_name'] . " " . $row['user_last_name'] . " &nbsp; - &nbsp; " . $row['form_number'] . " " . $row['stream_name'] . "</li>";
        }
    } else {
        echo "<p class='text-light'>No candidate(s) yet</p>";
    }
}

require_once 'resources/templates/footer.php';

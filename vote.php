<?php
include_once "functions.php";
session_start();
check_session();

if(isset($_SESSION["userEmail"])) {
    $first_name = $_SESSION["userFirstName"];
    $last_name = $_SESSION["userFirstName"];
    $student_class = $_SESSION["userClass"];
    $voter_id = $_SESSION["userId"];
}
if(isset($_SESSION["userEmail"]) && $_SESSION["userType"] == "student") {
    $link = connect_to_db();
    $result = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM classes_tbl WHERE class_id = '$student_class'"));
    $user_FormNumber = $result['form_number'];
    $user_StreamName = $result['stream_name'];
} else {
    $user_FormNumber = "";
}

?>

<!doctype html>
<html lang="en-gb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--    Bootstrap CSS   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--    Google Fonts    -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!--    My stylesheet   -->
    <link rel="stylesheet" href="css/my_style.css" type="text/css">

    <title>VOTE</title>
</head>
<body class="vote_body">
<div class="container">
    <div class="row justify-content-center">
        <div class="justify-content-center double_paper">
            <div class="bg-light p-5 rounded paper">
                <div class="progress my_progress mb-3">
                    <div class="progress-bar bg-danger my_progress_bar" role="progressbar" id="progress_bar">
                        <b class="lead" id="progress_text">Step - 1</b>
                    </div>
                </div>
                <form action="" method="POST" id="voting_form">
                    <!--    CLASS PREFECT   -->
                    <div id="first">
                        <h4 class="text-center p-1">Class Prefect</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <input type="number" name="voter_id" value="<?=$voter_id?>" hidden>
                            <label class="vote-label" for="student_name">Vote for your Class Prefect</label>
                            <?php
                            foreach(get_class_lvl_candidates($student_class) as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='class_prefect' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text has-error" id="class_prefect-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="next-1">Next</a>
                        </div>
                    </div>

                    <!--    FORM CAPTAIN    -->
                    <div id="second">
                        <h4 class="text-center p-1">Form Captain</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <label class="vote-label" for="student_name">Vote for your Form Captain</label>
                            <?php
                            foreach(get_form_lvl_candidates($user_FormNumber) as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='form_capt' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text has-error" id="form_capt-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-2">Previous</a>
                            <a href="#" class="btn btn-danger" id="next-2">Next</a>
                        </div>
                    </div>

                    <!--    LIBRARY CAPTAIN-->
                    <div id="third">
                        <h4 class="text-center p-1">Library Captain</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <label class="vote-label" for="student_name">Vote for your Library Captain</label>
                            <?php
                            foreach(get_sch_lvl_candidates('library captain') as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='lib_capt' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text has-error" id="lib_capt-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-3">Previous</a>
                            <a href="#" class="btn btn-danger" id="next-3">Next</a>
                        </div>
                    </div>

                    <!--    GAMES CAPTAIN   -->
                    <div id="forth">
                        <h4 class="text-center p-1">Games Captain</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <label class="vote-label" for="student_name">Vote for your Games Captain</label>
                            <?php
                            foreach(get_sch_lvl_candidates('games captain') as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='games_capt' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text text-danger" id="games_capt-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-4">Previous</a>
                            <a href="#" class="btn btn-danger" id="next-4">Next</a>
                        </div>
                    </div>

                    <!--    DINING HALL CAPTAIN -->
                    <div id="fifth">
                        <h4 class="text-center p-1">Dining Hall Captain</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <label class="vote-label" for="student_name">Vote for your DiningHall Captain</label>
                            <?php
                            foreach(get_sch_lvl_candidates('dining hall captain') as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='dh_capt' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text has-error" id="dh_capt-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-5">Previous</a>
                            <a href="#" class="btn btn-danger" id="next-5">Next</a>
                        </div>
                    </div>

                    <!--    HEAD GIRL   -->
                    <div id="sixth">
                        <h4 class="text-center p-1">Head Girl</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <label class="vote-label" for="student_name">Vote for your Head Girl</label>
                            <?php
                            foreach(get_sch_lvl_candidates('head girl') as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='head_girl' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text has-error" id="head_girl-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-6">Previous</a>
                            <a href="#" class="btn btn-danger" id="next-6">Next</a>
                        </div>
                    </div>

                    <!--    HEAD BOY    -->
                    <div id="seventh">
                        <h4 class="text-center p-1">Head Boy</h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="form-group">
                            <label class="vote-label" for="student_name">Vote for your Head Boy</label>
                            <?php
                            foreach(get_sch_lvl_candidates('head boy') as $candidate) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='head_boy' value='$candidate[nominee_id]'>";
                                echo "<label class='form-check-label'>$candidate[user_first_name] $candidate[user_last_name]</label>";
                                echo "</div>";
                            }
                            ?>
                            <b class="form-text has-error" id="head_boy-err"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-7">Previous</a>
                            <input class="btn btn-success" type="submit" id="submit" name="submit" value="Submit">
                        </div>
                    </div>
                    <div id="success">
                        <h4 class="text-center p-1 success_note"></h4>
                        <hr style="margin: 0 0 1cm">
                        <div class="list">
                            <div class="list-menu" id="action">
                                <a class="dropdown-item" href="electometer.php">Electometer</a>
                                <a href="contestants.php" class="dropdown-item">Contestants</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php" target="_parent">Main page</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    JQuery              -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!--    Bootstrap Bundle    -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!--    My scripts and links-->
<script type="text/javascript" src="js/form_validations.js"></script>
<script type="text/javascript" src="js/my_javascript.js"></script>
<script src="js/ajax.js"></script>

<!--    Material Icons      -->

</body>
</html>

<?php
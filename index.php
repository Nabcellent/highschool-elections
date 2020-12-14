<?php
$page_title = "Main";

require_once 'resources/templates/header.php';

check_session();

$link = connect_to_db();

$student_id = $_SESSION["userId"];
$student_class_id = $_SESSION["userClass"];

$sql = "SELECT users_tbl.*, classes_tbl.form_number, classes_tbl.stream_name
        FROM users_tbl
        INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
        WHERE user_id = '$student_id'";
$res = mysqli_fetch_array(mysqli_query($link, $sql));

if($res["user_gender"] === "F") {
    $student_gender = "Female";
} else {
    $student_gender = "Male";
}

$student_form = $res["form_number"];
$student_stream = $res["stream_name"];

?>
<input type="number" id="student_class_id" value="<?= $student_class_id ?>" hidden>
<input type="number" id="student_id" value="<?= $student_id ?>" hidden>
<div class="jumbotron text-center">
    <h1>MAIN MENU</h1>
    <p>Your vote counts! Select your leaders!</p>
</div>

    <div class="container-fluid">
        <div class="row justify-content-center text-center text-light">
            <div class="col-md-12">
                <h1>YOUR ACCOUNT INFO...</h1>
                <hr class="bg-dark">
            </div>
        </div>
        <div class="row justify-content-center py-2 mx-4 bg-dark text-center text-light">
            <div class="col-md-5 p-2 bg-light text-dark details_div">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Personal Details</h4>
                        <hr class="bg-dark mt-0">
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-md-5 text-right">
                        <h5>Your Name -</h5>
                    </div>
                    <div class="col-md-7">
                        <p class="mb-0"><?= $res["user_first_name"] . " &nbsp " . $res["user_last_name"] ?></p>
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-md-5 text-right">
                        <h5>Your Gender -</h5>
                    </div>
                    <div class="col-md-7">
                        <p><?= $student_gender ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Class Details</h4>
                        <hr class="bg-dark mt-0">
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-md-5 text-right">
                        <h5>Your Form -</h5>
                    </div>
                    <div class="col-md-7">
                        <p class="mb-0"><?= $student_form ?></p>
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-md-5 text-right">
                        <h5>Your Stream -</h5>
                    </div>
                    <div class="col-md-7">
                        <p><?= $student_stream ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Your Nominees</h4>
                        <hr class="bg-dark mt-0">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Nominee Name</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Nominee Class</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Nominee Gender</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Nominee Position</h5>
                    </div>
                </div>
                <hr class="mt-0 bg-dark">
                <div id="student_nominees"></div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Your Classmates</h4>
                        <hr class="bg-light mt-1 w-50">
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-md-3" style="padding-left: 4rem;">
                        <h5>First name</h5>
                    </div>
                    <div class="col-md-3 pl-4">
                        <h5>Last name</h5>
                    </div>
                    <div class="col-md-3 pl-4">
                        <h5>Class</h5>
                    </div>
                    <div class="col-md-3 pl-3">
                        <h5>Gender</h5>
                    </div>
                </div>
                <hr class="mt-2 bg-light">
                <div id="classmates"></div>
            </div>
        </div>
    </div>

<?php
require_once 'resources/templates/footer.php';

?>


<script>
    $(document).ready( function() {
        var student_class_id = $('#student_class_id').val();
        fetch_classmates();

        function fetch_classmates() {
            $.ajax({
                data: {
                    student_class_id:student_class_id
                },
                url: 'fetch/fetch_classmates.php',
                type: 'POST',
                success:function(data) {
                    $('#classmates').html(data);
                }
            })
        }
    });

    $(document).ready( function() {
        var student_id = $('#student_id').val();
        fetch_student_nominees();

        function fetch_student_nominees() {
            $.ajax({
                data: {
                    student_id:student_id
                },
                url: 'fetch/fetch_students_nominees.php',
                type: 'POST',
                success:function(data) {
                    $('#student_nominees').html(data);
                }
            })
        }
    });
</script>

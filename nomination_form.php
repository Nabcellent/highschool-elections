<?php
$page_title = "Nominate";

require_once 'resources/templates/header.php';

check_session();

//Check if logged in
if(isset($_SESSION["userEmail"])) {
    $first_name = $_SESSION["userFirstName"];
    $last_name = $_SESSION["userFirstName"];
    $nominator_class = $_SESSION["userClass"];
    $nominator_id = $_SESSION["userId"];
}

//get nominator details
if(isset($_SESSION["userEmail"]) && $_SESSION["userType"] == "student") {
    $link = connect_to_db();
    $result = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM classes_tbl WHERE class_id = '$nominator_class'"));
    $user_FormNumber = $result['form_number'];
    $user_StreamName = $result['stream_name'];
} else {
    $user_FormNumber = "";
}

?>

<div class="jumbotron jumbotron-top text-center">
    <h1>NOMINATION FORM</h1>
    <p>Nominate your Leader! under the following <a href="#nomination_instructions" class="btn btn-dark" data-toggle="modal">rules!</a></p>
</div>

<div class="container nominate_body">
    <div class="row justify-content-md-center">
        <div class="col-md-auto double_paper">
            <div class="bg-light rounded nominate_paper">
                <form id="nomination_form">
                    <div class="form-group" hidden>
                        <input type="text" id="nominator_id" name="nominator_id" value="<?=$nominator_id?>">
                        <input type="number" id="nominator_class" name="nominator_class" value="<?=$nominator_class?>">
                        <input type="number" id="form_number" name="form_number" value="<?=$user_FormNumber?>">
                        <input type="text" id="stream_name" name="stream_name" value="<?=$user_StreamName?>">
                        <input type="number" id="nominee_class" name="nominee_class">
                    </div>

                    <p style="margin-bottom: 0">Do you wish to be a proposer or seconder?</p>
                    <div class="form-group row m-auto">
                        <input class="my-auto mr-2" type="radio" name="nominator_type" id="proposer" value="proposer">
                        <label class="my-auto mr-4" for="proposer">Proposer</label>
                        <input class="my-auto mr-2" type="radio" name="nominator_type" id="seconder" value="seconder">
                        <label class="my-auto mr-4" for="seconder">Seconder</label>
                    </div>

                    <p style="margin-top: 15px; margin-bottom: 0">Select the position for which you'd like to nominate a student</p>
                    <div class="form-group col mx-auto">
                        <div class="col">

                            <?php
                            $position = get_positions_details($user_FormNumber);

                            foreach ($position as $row) {
                                echo "<div class='form-check form-check'>";
                                echo "<input class='form-check-input' type='radio' name='position_id' value='$row[position_id]'>";
                                echo "<label class='form-check-label'>$row[position_name]</label><br>";
                                echo "</div>";
                            }
                            ?>

                        </div>
                    </div>

                    <p style="margin-top: 0; margin-bottom: 5px">Select the student you'd like to nominate</p>
                    <div class="form-group row mx-auto">
                        <div class="col pl-0" id="select_class_div" hidden>
                            <select class="frm_inputs" name="select_class" id="select_class" style="width: 5cm" >
                                <option hidden>------- Select -------</option>
                                <?php
                                $nominee_class = get_nominee_class($user_FormNumber);
                                foreach ($nominee_class as $class) {
                                    echo "<option value='$class[class_id]'>$class[form_number] $class[stream_name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col p-0">
                            <select class="frm_inputs" name="select_student" id="select_student" style="width: 5cm" disabled>
                                <option hidden>------- Select -------</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end m-auto">
                        <input class="btn btn-danger" type="submit" id="btn_save_nomination_details" value="SAVE">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Nomination Instructions Modal   -->
    <div id="nomination_instructions" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header text-primary">
                        <h4 class="modal-title">Nomination Instructions</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body text-white">
                        <div class="row">
                            <div class="col-md-5">
                                <h5>SCHOOL LEVEL &nbsp;-</h5>
                            </div>
                            <div class="col-md-7">
                                <p>Form 3 Students Only</p>
                            </div>
                        </div>
                        <ol>
                            <li>Head Boy</li>
                            <li>Head Girl</li>
                            <li>Dinning Hall Captain</li>
                            <li>Games Captain</li>
                            <li>Library Captain</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-5">
                                <h5>FORM LEVEL &nbsp;&nbsp;&nbsp;&nbsp; -</h5>
                            </div>
                            <div class="col-md-7">
                                <p>All Students</p>
                            </div>
                        </div>
                        <ol>
                            <li>Form Captain</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-5">
                                <h5>CLASS LEVEL &nbsp;&nbsp;&nbsp;&nbsp; -</h5>
                            </div>
                            <div class="col-md-7">
                                <p>All students</p>
                            </div>
                        </div>
                        <ol>
                            <li>Class Prefect</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="CLOSE">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once 'resources/templates/footer.php';




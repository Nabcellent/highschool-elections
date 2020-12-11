<?php
include_once 'header.php';
//Check if logged in
if(isset($_SESSION["userEmail"])) {
    $first_name = $_SESSION["userFirstName"];
    $last_name = $_SESSION["userFirstName"];
    $student_class = $_SESSION["userClass"];
    $nominator_id = $_SESSION["userId"];
}

//get nominator details
if(isset($_SESSION["userEmail"]) && $_SESSION["userType"] == "student") {
    $link = connect_to_db();
    $result = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM classes_tbl WHERE class_id = '$student_class'"));
    $user_FormNumber = $result['form_number'];
    $user_StreamName = $result['stream_name'];
} else {
    $user_FormNumber = "";
}

?>

<div class="jumbotron jumbotron-top text-center">
    <h1>NOMINATION FORM</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form id="nomination_form">
                <div hidden>
                    <input type="text" id="nominator_id" name="nominator_id" value="<?=$nominator_id?>">
                    <input type="number" id="student_class" name="student_class" value="<?=$student_class?>">
                    <input type="number" id="form_number" name="form_number" value="<?=$user_FormNumber?>">
                    <input type="text" id="stream_name" name="stream_name" value="<?=$user_StreamName?>">
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
                        echo "<input class=' mr-2'  type='radio' name='position_name' value='$row[position_id]'>";
                        echo "<label>$row[position_name]</label><br>";
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

<?php
include_once 'footer.php';
?>




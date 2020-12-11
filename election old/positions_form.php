<?php
include "header.php";

$level = array("School Level", "Form Level", "Class Level");

?>

<div class="jumbotron jumbotron-top text-center">
    <h1>POSITIONS FORM</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form class="registration_form" id="positions_form">
                <div class="form-group row mx-auto">
                    <label class="frm_labels" for="position_name"> NAME :</label>
                    <input class="frm_inputs" type="text" id="position_name" name="position_name" placeholder="Enter Position's Name *">
                </div>
                <div class="form-group row mx-auto">
                    <label class="frm_labels" for="position_level"> LEVEL :</label>
                    <select class="frm_inputs" id="position_level" name="position_level">
                        <option hidden>Select Level *</option>
                        <?php
                        foreach ($level as $item) {
                            echo "<option value='$item'>$item</option>";
                        }
                        ?>
                        ?>
                    </select>
                </div>
                <div class="form-group row m-auto">
                    <label class="frm_labels" for="position_eligibility"> ELIGIBILITY :</label>
                    <input class="to_check my-auto mr-2" type="checkbox" id="form1" name="eligibility" value="1">
                    <label class="my-auto mr-4" for="form1">Form 1</label>
                    <input class="to_check my-auto mr-2" type="checkbox" id="form2" name="eligibility" value="2">
                    <label class="my-auto mr-4" for="form2">Form 2</label>
                    <input class="to_check my-auto mr-2" type="checkbox" id="form3" name="eligibility" value="3">
                    <label class="my-auto mr-4" for="form3">Form 3</label>
                    <input class="to_check my-auto mr-2" type="checkbox" id="form4" name="eligibility" value="4">
                    <label class="my-auto mr-4" for="form4">Form 4</label><br>
                    <input class="check_all my-auto mr-2" type="checkbox" label="check all">
                    <label class="my-auto mr-4" for="check_all">All</label>
                </div>
                <div class="form-group row justify-content-end m-auto">
                    <input class="btn btn-primary" type="submit" id="btn_save_position_details" value="SAVE">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
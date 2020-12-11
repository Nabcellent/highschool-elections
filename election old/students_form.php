<?php
include_once 'header.php';
?>

<div class="jumbotron jumbotron-top text-center">
    <h1>STUDENTS FORM</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form class="registration_form" id="students_form">
                <div class="form-group row mx-auto">
                    <label for="first_name" class="frm_labels"> FIRST NAME :</label>
                    <input type="text" id="first_name" name="first_name" class="frm_inputs" placeholder="Enter First Name *">
                </div>
                <div class="form-group row mx-auto">
                    <label for="last_name" class="frm_labels"> SURNAME :</label>
                    <input type="text" id="last_name" name="last_name" class="frm_inputs" placeholder="Enter Second Name *">
                </div>
                <div class="form-group row mx-auto">
                    <label for="students_class" class="frm_labels"> CLASS :</label>
                    <select class="frm_inputs" id="students_class" name="students_class">
                        <option value="" hidden>Select class *</option>
                        <?php
                        $classes = get_classes_details();

                        foreach ($classes as $row) {
                            echo "<option value = '$row[0]'>$row[1] $row[2]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group row m-auto">
                    <label class="frm_labels"> GENDER : </label>
                    <input class="my-auto mr-2" type="radio" id="male" name="gender" value="M">
                    <label class="my-auto mr-4" for="male">Male</label>
                    <input class="my-auto mr-2" type="radio" id="female" name="gender" value="F">
                    <label class="my-auto" for="female">Female</label>
                </div>
                <div class="form-group row justify-content-end m-auto">
                    <input class="btn btn-primary" type="submit" id="btn_save_students_details" value="SAVE">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
<?php
include_once 'header.php';
?>

<div class="jumbotron jumbotron-top text-center">
    <h1>CLASSES FORM</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form class="registration_form" id="classes_form">
                <div class="form-group row mx-auto">
                    <label class="frm_labels" for="class_name">FORM :</label>
                    <input class="frm_inputs" type="number" id="class_name" name="class_name" placeholder="Enter Class' Number">
                </div>
                <div class="form-group row mx-auto">
                    <label class="frm_labels" for="stream_name">STREAM NAME :</label>
                    <input class="frm_inputs" type="text" id="stream_name" name="stream_name" placeholder="Enter Stream Name">
                </div>
                <div class="form-group row justify-content-end m-auto">
                    <input class="btn btn-primary" type="submit" id="btn_save_class_details" value="SAVE">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
<?php
$page_title = "Students";

require_once 'resources/templates/header.php';

$link = connect_to_db();

check_session();
?>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><span class="material-icons">settings</span> Manage <b>Students</b></h2>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success" href="#addStudentModal" data-toggle="modal">
                        <i class="fas fa-plus-circle"></i>
                        <span> Add New Student</span>
                    </a>
                    <a class="btn btn-danger" href="JavaScript:void(0);" id="delete_multiple_students">
                        <i class="fas fa-trash"></i>
                        <span> Delete Multiple</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover" id="students_table">
            <thead>
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>STUDENT ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>CLASS</th>
                <th>GENDER</th>
                <th>ACTIONS</th>
            </tr>
            </thead>

            <tbody>

            <?php
            $i = 1;
            $query = mysqli_query($link, "SELECT users_tbl.user_id, users_tbl.user_first_name, users_tbl.user_last_name, users_tbl.user_gender, users_tbl.user_class, classes_tbl.form_number, classes_tbl.stream_name
                                                FROM users_tbl
                                                INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id 
                                                WHERE users_tbl.user_type = 'student'
                                                ORDER BY form_number, stream_name");

            while ($student = mysqli_fetch_array($query)) {
                ?>

                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input class="student_checkbox" type="checkbox" data-user-id="<?= $student['user_id'] ?>">
                            <label for=""></label>
                        </span>
                    </td>
                    <td><?= $i ?></td>
                    <td><?= $student['user_first_name'] ?></td>
                    <td><?= $student['user_last_name'] ?></td>
                    <td><?= $student['form_number'] . " &nbsp " . $student['stream_name'] ?></td>
                    <td><?= $student['user_gender'] ?></td>
                    <td>
                        <a href="#editStudentModal" data-toggle="modal">
                            <i class="fas fa-pen update-student" data-toggle="tooltip"
                               data-student_id="<?= $student['user_id'] ?>"
                               data-student_first_name="<?= $student['user_first_name'] ?>"
                               data-student_last_name="<?= $student['user_last_name'] ?>"
                               data-student_class="<?= $student['user_class'] ?>"
                               data-student_gender="<?= $student['user_gender'] ?>"
                               title="Edit"></i>
                        </a>
                        <a class="delete" href="#deleteStudentModal" data-toggle="modal"
                           data-id="<?= $student['user_id'] ?>">
                            <i class="fas fa-trash delete" data-toggle="tooltip" title="Delete"></i>
                        </a>
                    </td>
                </tr>

                <?php
                $i++;
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

<!--    Add Modal HTML  -->
<div id="addStudentModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="students_form">
                <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>
                    <button class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">FIRST NAME :</label>
                        <input class="form-control" type="text" id="first_name" name="first_name"
                               placeholder="Enter First Name *">
                    </div>
                    <div class="form-group">
                        <label for="last_name">SURNAME :</label>
                        <input class="form-control" type="text" id="last_name" name="last_name"
                               placeholder="Enter Second Name *">
                    </div>
                    <div class="form-group">
                        <label for="students_class"> CLASS :</label>
                        <select class="form-control" id="students_class" name="students_class">
                            <option value="" hidden>Select class *</option>
                            <?php
                            $classes = get_classes_details();

                            foreach ($classes as $row) {
                                echo "<option value = '$row[0]'>$row[1] &nbsp; $row[2]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="frm_labels">GENDER :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="male" name="gender" value="M">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="female" name="gender" value="F">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <input type="hidden" name="type" value="1">
                        <input class="btn btn-default" type="button" data-dismiss="modal" value="Cancel">
                        <button class="btn btn-success" type="submit" id="btn-add-student">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Edit Modal HTML -->
<div id="editStudentModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_students_form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Student</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" id="student_id_edit" name="student_id">
                        <label for="first_name">FIRST NAME :</label>
                        <input class="form-control" type="text" id="first_name_edit" name="first_name"
                               placeholder="Enter First Name *">
                    </div>
                    <div class="form-group">
                        <label for="last_name">SURNAME :</label>
                        <input class="form-control" type="text" id="last_name_edit" name="last_name"
                               placeholder="Enter Second Name *">
                    </div>
                    <div class="form-group">
                        <label for="students_class"> CLASS :</label>
                        <select class="form-control" id="students_class_edit" name="students_class">
                            <option value="" hidden>Select class *</option>
                            <?php
                            $classes = get_classes_details();

                            foreach ($classes as $row) {
                                echo "<option value = '$row[0]'>$row[1] $row[2]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="frm_labels"> GENDER : </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="male_edit" name="gender_edit" value="M">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="female_edit" name="gender_edit" value="F">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                    <button type="submit" class="btn btn-info" id="update-student">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Delete Modal HTML   -->
<div id="deleteStudentModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="student_id_d" name="student_id" class="form-control">
                    <p>Are you sure you want to delete this record?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="CANCEL">
                    <button type="submit" class="btn btn-danger" id="delete-student">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once 'resources/templates/footer.php';
?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

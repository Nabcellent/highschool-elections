<?php
$page_title = "Classes";
require_once 'header.php';
$link = connect_to_db();
?>

    <div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><span class="material-icons">settings</span> Manage <b>Classes</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addClassModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons"></i>
                            <span> Add New Class</span>
                        </a>
                        <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple_classes">
                            <i class="material-icons"></i>
                            <span>Delete</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover" id="classes_table">
                <thead>
                <tr>
                    <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                    </th>
                    <th>CLASS ID</th>
                    <th>FORM NUMBER</th>
                    <th>STREAM NAME</th>
                    <th>ACTIONS</th>
                </tr>
                </thead>

                <tbody>

                <?php
                $result = mysqli_query($link, "SELECT * FROM classes_tbl WHERE form_number != 0 ORDER BY form_number, stream_name");
                $i=1;

                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr id="<?php echo $row["class_id"]; ?>">
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" class="class_checkbox" data-user-id="<?= $row["class_id"] ?>">
								<label for="checkbox2"></label>
							</span>
                        </td>
                        <td><?= $i; ?></td>
                        <td><?= $row["form_number"] ?></td>
                        <td><?= $row["stream_name"] ?></td>
                        <td>
                            <a href="#editClassModal" class="edit" data-toggle="modal">
                                <i class="material-icons update-class" data-toggle="tooltip"
                                   data-class_id="<?= $row["class_id"] ?>"
                                   data-form_number="<?= $row["form_number"] ?>"
                                   data-stream_name="<?= $row["stream_name"] ?>"
                                   title="Edit"></i>
                            </a>
                            <a href="#deleteClassModal" class="delete" data-id="<?= $row["class_id"] ?>" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete"></i>
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

    <!-- Add Modal HTML -->
    <div id="addClassModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="classes_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_name">FORM NUMBER:</label>
                            <select class="form-control" id="form_number" name="form_number">
                                <option hidden>Select Form *</option>
                                <option value="1">Form 1</option>
                                <option value="2">Form 2</option>
                                <option value="3">Form 3</option>
                                <option value="4">Form 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stream_name">STREAM NAME :</label>
                            <input class="form-control" type="text" id="stream_name" name="stream_name" placeholder="Enter Stream Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-success" id="btn-add-class">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editClassModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_classes_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="class_id_edit" name="class_id" class="form-control" required>
                        <div class="form-group">
                            <label for="class_name">FORM NUMBER:</label>
                            <input class="form-control" type="number" id="form_number_edit" name="form_number" placeholder="Enter Class' Number">
                        </div>
                        <div class="form-group">
                            <label for="stream_name">STREAM NAME :</label>
                            <input class="form-control" type="text" id="stream_name_edit" name="stream_name" placeholder="Enter Stream Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-info" id="update-class">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteClassModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="class_id_d" name="class_id" class="form-control">
                        <p>Are you sure you want to delete this Record?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="CANCEL">
                        <button type="button" class="btn btn-danger" id="delete-class">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once 'footer.php';
?>
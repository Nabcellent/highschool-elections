<?php
$page_title = "Electoral Positions";
require_once 'resources/templates/header.php';

check_session();
$link = connect_to_db();

$level = array("School Level", "Form Level", "Class Level");

?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><i class="fas fa-cogs"></i> Manage <b>Positions</b></h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple_positions">
                            <i class="fas fa-trash"></i>
                            <span> Delete Multiple</span>
                        </a>
                        <a href="#addPositionModal" class="btn btn-success" data-toggle="modal">
                            <i class="fas fa-plus-circle"></i>
                            <span> Add New Position</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                    </th>
                    <th>POSITION ID</th>
                    <th>POSITION NAME</th>
                    <th>POSITION LEVEL</th>
                    <th>POSITION ELIGIBILITY</th>
                    <th>ACTIONS</th>
                </tr>
                </thead>

                <tbody>

                <?php
                $result = mysqli_query($link, "SELECT * FROM positions_tbl");
                $i = 1;

                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr id="<?php echo $row["position_id"]; ?>">
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?= $row["position_id"] ?>">
								<label for="checkbox2"></label>
							</span>
                        </td>
                        <td><?= $i; ?></td>
                        <td><?= $row["position_name"] ?></td>
                        <td><?= $row["position_level"] ?></td>
                        <td><?= $row["position_eligibility"] ?></td>
                        <td>
                            <a href="#editPositionModal" class="edit" data-toggle="modal">
                                <i class="fas fa-pen update" data-toggle="tooltip"
                                   data-pos_id="<?= $row["position_id"] ?>"
                                   data-pos_name="<?= $row["position_name"] ?>"
                                   data-pos_level="<?= $row["position_level"] ?>"
                                   data-pos_eligibility="<?= $row["position_eligibility"] ?>"
                                   title="Edit"></i>
                            </a>
                            <a href="#deletePositionModal" class="delete" data-id="<?= $row["position_id"] ?>"
                               data-toggle="modal">
                                <i class="fas fa-trash" data-toggle="tooltip" title="Delete"></i>
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

    <div id="addPositionModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="positions_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Position</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="position_name"> NAME :</label>
                            <input class="form-control" type="text" id="position_name" name="position_name"
                                   placeholder="Enter Position's Name *">
                        </div>
                        <div class="form-group">
                            <label for="position_level"> LEVEL :</label>
                            <select class="form-control" id="position_level" name="position_level">
                                <option disabled selected hidden>Select Level *</option>
                                <?php
                                foreach ($level as $item) {
                                    echo "<option value='$item'>$item</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label class="frm_labels" for="position_eligibility"> ELIGIBILITY :</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form1" name="eligibility[]"
                                       value="1">
                                <label class="form-check-label" for="form1">Form 1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form2" name="eligibility[]"
                                       value="2">
                                <label class="form-check-label" for="form2">Form 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form3" name="eligibility[]"
                                       value="3">
                                <label class="form-check-label" for="form3">Form 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form4" name="eligibility[]"
                                       value="4">
                                <label class="form-check-label" for="form4">Form 4</label><br>
                            </div>
                            <input class="check_all" type="checkbox" id="check_all">
                            <label for="check_all">All</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-success" id="btn-add">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editPositionModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_positions_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Position</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="position_id_edit" name="position_id" class="form-control" required>
                        <div class="form-group">
                            <label for="position_name"> NAME :</label>
                            <input class="form-control" type="text" id="position_name_edit" name="position_name"
                                   placeholder="Enter Position's Name *">
                        </div>
                        <div class="form-group">
                            <label for="position_level"> LEVEL :</label>
                            <select class="form-control" id="position_level_edit" name="position_level">
                                <option hidden>Select Level *</option>
                                <?php
                                foreach ($level as $item) {
                                    echo "<option value='$item'>$item</option>";
                                }
                                ?>
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label class="frm_labels" for="position_eligibility"> ELIGIBILITY :</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form1_edit" name="eligibility[]"
                                       value="1">
                                <label class="form-check-label" for="form1">Form 1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form2_edit" name="eligibility[]"
                                       value="2">
                                <label class="form-check-label" for="form2">Form 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form3_edit" name="eligibility[]"
                                       value="3">
                                <label class="form-check-label" for="form3">Form 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="form4_edit" name="eligibility[]"
                                       value="4">
                                <label class="form-check-label" for="form4">Form 4</label><br>
                            </div>
                            <input class="check_all" type="checkbox" id="check_all_edit">
                            <label for="check_all_edit">All</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-info" id="update-position">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->

    <div id="deletePositionModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Position</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="position_id_d" name="position_id" class="form-control">
                        <p>Are you sure you want to delete this Record?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="CANCEL">
                        <button type="button" class="btn btn-danger" id="delete-position">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<?php
require_once 'resources/templates/footer.php';
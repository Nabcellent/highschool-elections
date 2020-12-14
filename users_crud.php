<?php
$page_title = "Students";

require_once 'resources/templates/header.php';

$link = connect_to_db();

check_session();

$sql = "SELECT users_tbl.*, classes_tbl.form_number, classes_tbl.stream_name
        FROM users_tbl
        INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
        /*ORDER BY form_number, stream_name*/";
$res = mysqli_query($link, $sql);
$users = array();

$i = 1;
while($user = mysqli_fetch_array($res)) {
    $users[] = "<tr>
            <td>
                <span class='custom-checkbox'>
                            <input class='student_checkbox' type='checkbox' data-user-id='" .  $user['user_id']  . "'>
            <label for=''></label>
            </span>
            </td>
            <td>" . $i . "</td>
            <td>" . $user['user_first_name'] . "</td>
            <td> " . $user['user_last_name'] . "</td>
            <td> " . $user['form_number'] . " " . $user['stream_name'] . "</td>
            <td> " . $user['user_gender'] . "</td>
            <td> " . $user['username'] . "</td>
            <td>
            <a href='#editUserModal' data-toggle='modal'>
                <i class='fas fa-pen update-user' data-toggle='tooltip'
                   data-user_id='" .  $user['user_id'] . "'
                   data-user_first_name='" .  $user['user_first_name'] . "'
                   data-user_last_name='" .  $user['user_last_name'] . "'
                   data-user_class='" .  $user['user_class'] . "'
                   data-user_email='" .  $user['user_email'] . "'
                   data-user_username='" .  $user['username'] . "'
                   title='Edit'></i>
            </a>
            <a class='delete-user' href='#deleteUserModal' data-toggle='modal'
               data-id='" . $user['user_id'] . "'>
                <i class='fas fa-trash' data-toggle='tooltip' title='Delete'></i>
            </a>
            </td>
        </tr>";
    $i++;
}

?>

<div class="container-fluid">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><i class="fas fa-users-cog"></i> Manage <b>Users</b></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-danger" href="JavaScript:void(0);" id="delete_multiple_users">
                        <i class="fas fa-trash"></i>
                        <span> Delete Multiple</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table bg-dark table-bordered w-100 users_datatable">
            <thead class="text-light">
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            </thead>
            <thead class="bg-light">
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="text-light">
            <?php
            foreach($users as $user) {
                echo $user;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!--    Edit Modal HTML -->
<div id="editUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_user_form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="hidden" id="user_id_e" name="user_id_e">
                                <label for="user_first_name_e">First name :</label>
                                <input class="form-control" type="text" id="user_first_name_e" name="user_first_name_e"
                                       placeholder="Enter first name *">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_last_name_e">Last name :</label>
                                <input class="form-control" type="text" id="user_last_name_e" name="user_last_name_e"
                                       placeholder="Enter last name *">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_class_e"> Class :</label>
                        <select class="form-control" id="user_class_e" name="user_class_e">
                            <option value="" hidden>Select class *</option>
                            <?php
                            $link = connect_to_db();
                            $query = mysqli_query($link, "SELECT * FROM classes_tbl ORDER BY form_number, stream_name");
                            $classes_arr = array();

                            while($row = mysqli_fetch_array($query)) {
                                $classes_arr[] = $row;
                            }

                            foreach ($classes_arr as $row) {
                                echo "<option value = '$row[0]'>$row[1] &nbsp; $row[2]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_email_e">Email</label>
                                <input type="text" class="form-control" id="user_email_e" name="user_email_e" placeholder="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_username_e">Username</label>
                                <input type="text" class="form-control" id="user_username_e" name="user_username_e" placeholder="username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_pass_e">Password</label>
                        <input class="form-control" type="password" id="user_pass_e" name="user_pass_e" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="frm_labels">Gender :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="user_male_e" name="user_gender_e" value="M">
                            <label class="form-check-label" for="user_male_e">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="user_female_e" name="user_gender_e" value="F">
                            <label class="form-check-label" for="user_female_e">Female</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <input type="hidden" name="type" value="1">
                        <input class="btn btn-default" type="button" data-dismiss="modal" value="Cancel">
                        <button class="btn btn-success" id="update-user">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Delete Modal HTML   -->
<div id="deleteUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id_d" name="user_id_d" class="form-control">
                    <p>Are you sure you want to delete this record?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="CANCEL">
                    <button type="submit" class="btn btn-danger" id="delete-user">Delete</button>
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

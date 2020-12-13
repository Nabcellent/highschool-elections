<?php
$page_title = "Profile";

require_once "resources/templates/header.php";

check_session();

$link = connect_to_db();

if(isset($_SESSION["userEmail"])) {
    $user_id = $_SESSION["userId"];
}

$query = "SELECT users_tbl.user_type, users_tbl.user_first_name, users_tbl.user_last_name, users_tbl.username, users_tbl.user_password, users_tbl.user_gender, users_tbl.user_email, classes_tbl.form_number, classes_tbl.stream_name
        FROM users_tbl
        INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id
        WHERE user_id = '$user_id'";
$user_details = mysqli_fetch_array(mysqli_query($link, $query));

$user_type = $user_details["user_type"];
$user_form_number = $user_details["form_number"];
$user_stream_name = $user_details["stream_name"];
$user_first_name = $user_details["user_first_name"];
$user_last_name = $user_details["user_last_name"];
$user_username = $user_details["username"];
$user_email = $user_details["user_email"];

if($_SESSION["userGender"] == "F") {
    $user_gender = "Female";
} else if($_SESSION["userGender"] == "M") {
    $user_gender = "Male";
} else {
    $user_gender = "N/A";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFILE PAGE</title>
</head>
<body>
<div class="container mt-lg-5 mb-5">
    <table class="table table-hover profile-table">
        <thead class="bg-dark text-light">
        <tr>
            <th scope="col"><h3><?= $user_first_name . "&nbsp" . $user_last_name . "'s" ?> PROFILE</h3></th>
            <th class="text-capitalize" scope="col" colspan="2"><h4 class="float-right"><?= $user_type ?></h4></th>
        </tr>
        </thead>

        <tbody class="text-light">
        <tr>
            <td>First Name</td>
            <td colspan="2"><?= $user_first_name ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td colspan="2"><?= $user_last_name ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?= $user_gender ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" value="1234567" disabled></td>
            <td>
                <a href="#confirmPasswordModal" class="confirm" data-toggle="modal">
                    <i class="material-icons" data-toggle="tooltip"
                       title="Edit">edit</i>
                </a>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td><?= $user_username ?></td>
            <td>
                <a href="#editUsernameModal" class="edit" data-toggle="modal">
                    <i class="material-icons update-username" data-toggle="tooltip"
                       data-user_id="<?= $user_id ?>"
                       data-user_username="<?= $user_username ?>"
                       title="Edit">edit</i>
                </a>
            </td>
        </tr>
        <tr>
            <td>Email Address</td>
            <td><?= $user_email ?></td>
            <td>
                <a href="#editEmailModal" class="edit" data-toggle="modal">
                    <i class="material-icons update-email" data-toggle="tooltip"
                       data-user_id="<?= $user_id ?>"
                       data-user_email="<?= $user_email ?>"
                       title="Edit">edit</i>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<!--    Confirm Password Modal  -->
<div id="confirmPasswordModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="confirm_password_form">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input class="form-control" id="old_pass_id" name="user_id" type="text" value="<?= $user_id ?>" hidden>
                    <div class="form-group">
                        <input class="form-control" id="old_pass" name="old_pass" type="password" placeholder="Enter current password">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" id="cancel-modal" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="confirm-pass" value="NEXT">
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Edit Password Modal -->
<div id="editPasswordModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_password_form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input class="form-control" id="new_pass_id" name="user_id" type="text" value="<?= $user_id ?>" hidden>
                    <div class="form-group">
                        <input class="form-control" id="new_pass" name="password" type="password" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="new_pass_confirm" name="password_confirm" type="password" placeholder="Confirm New password">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="update-pass" value="UPDATE">
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Edit Username Modal -->
<div id="editUsernameModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_username_form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Username</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input class="form-control" id="username_id" name="user_id" type="text" hidden>
                    <div class="form-group">
                        <input class="form-control" id="new_username" name="new_username" type="text" placeholder="Enter new username">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" name="edit_type" value="edit_username" hidden>
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="update-username" value="UPDATE">
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Edit Email Modal    -->
<div id="editEmailModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_email_form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Email</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input class="form-control" id="email_id" name="user_id" type="text" hidden>
                    <div class="form-group">
                        <input class="form-control" id="new_email" name="new_email" type="email" placeholder="Enter new email">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="update-email" value="UPDATE">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
require_once "resources/templates/footer.php";
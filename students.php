<?php
$page_title = "Students";
require_once 'resources/templates/header.php';

$link = connect_to_db();

$sql = "SELECT users_tbl.user_first_name, users_tbl.user_last_name, users_tbl.user_gender, classes_tbl.form_number, classes_tbl.stream_name
        FROM users_tbl
        INNER JOIN classes_tbl ON users_tbl.user_class = classes_tbl.class_id WHERE users_tbl.user_type = 'student'
        /*ORDER BY form_number, stream_name*/";
$res = mysqli_query($link, $sql);
$students = array();

while($row = mysqli_fetch_array($res)) {
    $students[] = "<tr>
            <td>" . $row['user_first_name'] . "</td>
            <td> " . $row['user_last_name'] . "</td>
            <td> " . $row['form_number'] . " " . $row['stream_name'] . "</td>
            <td> " . $row['user_gender'] . "</td>
        </tr>";
}

?>

<div class="container mt-3 mb-3 bg-light">
    <table class="table bg-dark table-bordered w-100 students_datatable">
        <thead class="text-light">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Class</th>
            <th>Gender</th>
        </tr>
        </thead>
        <thead class="bg-light">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Class</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody class="text-light">
        <?php
        foreach($students as $student) {
            echo $student;
        }
        ?>
        </tbody>
    </table>
</div>

<?php
require_once 'resources/templates/footer.php';

?>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

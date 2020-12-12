<?php
$page_title = "Contestants";

require_once 'resources/templates/header.php';

check_session();

$link = connect_to_db();

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col" id="contestants_div">
                <div class="text-center">
                    <button id="all_all" class="btn btn-primary m-3 align-center">VIEW NOMINATORS</button>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>CLASS PREFECT</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table id="cp_tbl" class="table table-hover table-fixed">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('CLASS PREFECT');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>HEAD BOY</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('head boy');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>HEAD GIRL</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead"><table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('head girl');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>DINING HALL CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('dining hall captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>GAMES CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('games captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>LIBRARY CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('library captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="col-auto card">
                        <div class="card-header">
                            <h4>FORM CAPTAIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-light">
                                    <tr>
                                        <th colspan="2">Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nominees = get_nominees('form captain');

                                    foreach($nominees as $nominee) {
                                        echo $nominee;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'resources/templates/footer.php';
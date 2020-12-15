<?php
include 'functions.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <!--    Library links       -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!--    Google Fonts        -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!--    My link libraries   -->
    <link rel="stylesheet" href="../../css/my_style.css" type="text/css">

    <title>Elections - <?= $page_title ?></title>
</head>
<body>
<nav id="navbar" class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">S-ELECT</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_menu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav_menu">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">

                <?php
                if ((isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "admin") || (isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "standard")) {
                    echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="#register_menu" href="#">REGISTRATION';
                    echo '<span class="caret"></span>';
                    echo '</a>';
                    echo '<div class="dropdown-menu" id="register_menu">';
                    echo '<a class="dropdown-item" href="../../classes_crud.php">REGISTER CLASSES</a>';
                    echo '<a class="dropdown-item" href="../../positions_crud.php">REGISTER POSITION</a>';
                    echo '<div class="dropdown-divider"></div>';
                    echo '<a class="dropdown-item" href="../../students_crud.php">REGISTER STUDENT</a>';
                    echo '</div>';
                }
                ?>

            </li>

            <?php
            if ((isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "admin") || (isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "standard")) {
                echo '<li class="nav-item"> <a class="nav-link" href="../../users_crud.php">USERS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../students_crud.php">STUDENTS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../nomination_form.php">NOMINATE</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../contestants.php">CONTESTANTS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../vote.php" target="_blank">VOTE</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../electometer.php">ELECTORATE</a> </li>';
            } else if(isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "student"){
                echo '<li class="nav-item"> <a class="nav-link" href="../../students.php">STUDENTS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../nomination_form.php">NOMINATE</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="../../contestants.php">CONTESTANTS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link disabled" href="../../vote.php" target="_blank">VOTE</a> </li>';
            }

            ?>

        </ul>
        <?php
        if (isset($_SESSION["userEmail"])) {
            if($_SESSION["userType"] === "admin") {
                echo '<ul class="navbar nav ml-auto p-0">';
                echo "<li class='nav-item'> <a class='nav-link text-danger mr-2' href='../../profile.php'>" . $_SESSION['userFirstName'][0] . ". " . $_SESSION['userLastName'] . "</a> </li>";
                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle pr-3" data-toggle="dropdown" data-target="#admin_menu" href="#">ADMIN';
                echo '<span class="caret"></span>';
                echo '</a>';
                echo '<div class="dropdown-menu w-50" id="admin_menu">';
                echo '<a class="dropdown-item" href="../../sign_up.php">SIGN UP</a>';
                echo '<a class="dropdown-item" href="../../includes/logout.inc.php">LOGOUT</a>';
                echo '</li>';
                echo '</ul>';
            } else {
                echo "<ul class='navbar-nav ml-auto'>";
                echo "<li class='nav-item'> <a class='nav-link text-danger mr-2' href='../../profile.php'>" . $_SESSION['userFirstName'][0] . ". " . $_SESSION['userLastName'] . "</a> </li>";
                echo "<li class='nav-item'> <a class='nav-link' href='../../includes/logout.inc.php'>LOGOUT</a> </li>";
                echo "</ul>";
            }
        } else {
            echo "<ul class='navbar-nav ml-auto'>
                <li class='nav-item'> <a class='nav-link' href='../../student_sign_up.php'>SIGN-UP</a> </li>
                <li class='nav-item'> <a class='nav-link' href='../../login.php'>LOGIN</a> </li>
            </ul>";
        }
        ?>
    </div>
</nav>

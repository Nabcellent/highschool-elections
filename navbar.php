<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<nav id="navbar" class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">S-ELECT</a>
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
                    echo '<a class="dropdown-item" href="classes_crud.php">REGISTER CLASSES</a>';
                    echo '<a class="dropdown-item" href="positions_crud.php">REGISTER POSITION</a>';
                    echo '<div class="dropdown-divider"></div>';
                    echo '<a class="dropdown-item" href="students_crud.php">REGISTER STUDENT</a>';
                }
                ?>

            </li>

            <?php
            if ((isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "admin") || (isset($_SESSION["userEmail"]) && $_SESSION["userType"] === "standard")) {
                echo '<li class="nav-item"> <a class="nav-link" href="nomination_form.php">NOMINATE</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="contestants.php">CONTESTANTS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="vote.php" target="_blank">VOTE</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="#">REPORT</a> </li>';
            } else if(isset($_SESSION["userEmail"]) && $_SESSION["userType"] == "student"){
                echo '<li class="nav-item"> <a class="nav-link" href="nomination_form.php">NOMINATE</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="contestants.php">CONTESTANTS</a> </li>';
                echo '<li class="nav-item"> <a class="nav-link" href="vote.php">VOTE</a> </li>';
            }

            ?>

        </ul>
        <?php
        if (isset($_SESSION["userEmail"])) {
            echo "<ul class='navbar-nav ml-auto'>
                <li class='nav-item'> <a class='nav-link text-danger' href='profile.php'>Hello " . $_SESSION['userFirstName'][0] . ". " . $_SESSION['userLastName'] . "</a> </li>
                <li class='nav-item'> <a class='nav-link' href='includes/logout.inc.php'>LOGOUT</a> </li>
            </ul>";
        } else {
            echo "<ul class='navbar-nav ml-auto'>
                <li class='nav-item'> <a class='nav-link' href='sign_up.php'>SIGN-UP</a> </li>
                <li class='nav-item'> <a class='nav-link' href='login.php'>LOGIN</a> </li>
            </ul>";
        }
        ?>
    </div>
</nav>

</body>
</html>
<?php
$page_title = "Main";
require_once 'header.php';
$link = connect_to_db();
check_session();
?>

<div class="jumbotron jumbotron-top text-center">
    <h1>MAIN MENU</h1>
    <p>Your vote counts! Select your leaders!</p>
</div>

<?php
require_once 'footer.php';
?>

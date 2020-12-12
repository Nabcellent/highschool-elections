<?php
$page_title = "Main";

require_once 'resources/templates/header.php';

check_session();
$link = connect_to_db();
?>

<div class="jumbotron jumbotron-top text-center">
    <h1>WELCOME TO MAIN MENU</h1>
    <p>Your vote counts! Select your leaders!</p>
</div>

<?php
require_once 'resources/templates/footer.php';

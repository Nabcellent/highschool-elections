<?php
function connect_to_db() {
    $db_host = "us-cdbr-east-02.cleardb.com";
    $db_user = "b14aeaeb18bd50";
    $db_name = "heroku_10d0d80b7c8f4b3";
    $db_pass = "79b34919";

    $elections_link = new mysqli($db_host, $db_user, $db_pass, $db_name) or
    die("Connection failed: %s\n. $elections_link -> error");

    return $elections_link;
}

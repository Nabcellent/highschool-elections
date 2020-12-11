<?php
session_start();
if (!isset($_SESSION['userEmail'])) {
    $data['session'] = false;
    $data['redirect_url'] = 'login.php';
} else {
    $data['session'] = true;
}
echo json_encode($data);
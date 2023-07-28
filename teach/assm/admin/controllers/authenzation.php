<?php
require_once(__DIR__ . '/../../User.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['currentUser'])) {
    $user = unserialize($_SESSION['currentUser']);
    if ($user->role != 1) {
        echo "go here";
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
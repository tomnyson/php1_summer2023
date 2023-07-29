<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once('./provider.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM categories where id=:id";
    $statement1 = $connection->prepare($sql);
    // var_dump($sql1);
    // die;
    if ($statement1->execute([':id' => $id])) {
        $_SESSION['message'] = "create success";;
        header('location: ./category.php');
        exit;
    }
}

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['maSP'])) {

    $idToRemove = $_GET['maSP'];
    $sanpham = $_SESSION['sanpham'];
    var_dump($sanpham);
    foreach ($sanpham as $key => $product) {
        if ($product['maSP'] === $idToRemove) {
            unset($sanpham[$key]);
            break; // Assuming each ID is unique, we can stop the loop after removing the item
        }
    }
    echo "after";
    var_dump($sanpham);
    $_SESSION['sanpham'] = $sanpham;
    header('Location: index.php');
    exit();
}
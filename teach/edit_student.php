<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['maSP'])) {

    $idToRemove = 2;

    foreach ($sanpham as $key => $product) {
        if ($product['maSP'] === $idToRemove) {
            unset($sanpham[$key]);
            break; // Assuming each ID is unique, we can stop the loop after removing the item
        }
    }
}
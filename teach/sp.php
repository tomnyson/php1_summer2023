<?php
session_start();

$sanpham = array(
    array("maSP" => 1, "ten" => 'Sách', 'gia' => 3000),
    array("maSP" => 2, "ten" => 'Sách', 'gia' => 3000),
    array("maSP" => 3, "ten" => 'Sách', 'gia' => 3000)
);

if (!isset($_SESSION['sanpham'])) {
    $_SESSION['sanpham'] = $sanpham;
}
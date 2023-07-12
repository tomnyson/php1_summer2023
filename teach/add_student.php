<?php
session_start();
if (isset($_POST['ma']) && isset($_POST['ten']) && isset($_POST['gia'])) {
    // validate
    $newSP = array(
        'maSP'   => $_POST['ma'],
        'ten'     => $_POST['ten'],
        'gia'      => $_POST['gia']
    );
    if (isset($_SESSION['sanpham'])) {
        $sanpham =  $_SESSION['sanpham'];
        array_push($sanpham, $newSP);
        $_SESSION['sanpham'] = $sanpham;
    } else {
        $sanpham = [];
        array_push($sanpham, $newSP);
        $_SESSION['sanpham'] = $sanpham;
    }

    header('Location: index.php');
    exit();
}
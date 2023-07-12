<?php
require('./sp.php');

if (isset($_POST['maSP']) && isset($_POST['ten']) && isset($_POST['gia'])) {
    // validate
    $newSP = array(
        'maSP'   => $_POST['maSP'],
        'ten'     => $_POST['ten'],
        'gia'      => $_POST['gia']
    );
    array_push($sanpham, $newSP);
    header('location:index.php');
}
<?php

$sanpham = array(
    array("maSP" => 1, "ten" => 'Sách', 'gia' => 3000),
    array("maSP" => 2, "ten" => 'Sách', 'gia' => 3000),
    array("maSP" => 3, "ten" => 'Sách', 'gia' => 3000)
);

if (isset($_POST['maSP']) && isset($_POST['ten']) && isset($_POST['gia'])) {
    // validate
    $newSP = array(
        'maSP'   => $_POST['maSP'],
        'ten'     => $_POST['ten'],
        'gia'      => $_POST['gia']
    );
    array_push($sanpham, $newSP);
    var_dump($sanpham);
}

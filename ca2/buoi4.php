<?php
$mang = array('nguyen van a', 'nguyen van b', 'nguyen van c');

for ($i = 0; $i < count($mang); $i++) {
    echo "{$i}. {$mang[$i]} <br>";
}

$mangLK = array('mssv' => 'pk001', 'ten' => 'nguyen van a', 'dtb' => 6.7);

echo $mangLK['mssv'] . "<br>";
echo $mangLK['ten'] . "<br>";
echo $mangLK['dtb'] . "<br>";

foreach ($mangLK as $value) {
    echo $value . "</br>";
}

$lop = array(
    array('mssv' => 'pk001', 'ten' => 'nguyen van a', 'dtb' => 6.7),
    array('mssv' => 'pk002', 'ten' => 'nguyen van a', 'dtb' => 6.7),
    array('mssv' => 'pk003', 'ten' => 'nguyen van a', 'dtb' => 6.7)
);

$lop1 = array(
    'pk001' => array(
        'ten' => 'nguyen van a', 'dtb' => 6.7
    ),
    'pk002' => array(
        'ten' => 'nguyen van b', 'dtb' => 6.7
    ),
    'pk003' => array(
        'ten' => 'nguyen van a', 'dtb' => 6.7
    )
);
// foreach ($lop as $sv) {
//     echo "mssv: {$sv['mssv']}</br>";
//     echo "ten: {$sv['ten']}</br>";
//     echo "dtb: {$sv['dtb']}</br>";
//     echo "-----------------------------<br>";
// }

foreach ($lop1 as $id => $sv) {
    echo "mssv: $id</br>";
    echo "ten: {$sv['ten']}</br>";
    echo "dtb: {$sv['dtb']}</br>";
    echo "-----------------------------<br>";
}

/**
 * tạo một mảng sp(maSP, ten, hinhanh, gia, danhmuc)
 * tạo một list sản phẩm 
 */

?>
<style>
    input {
        margin-bottom: 10px;
        width: 200px;
        height: 30px;
    }
</style>
<h2>QL Sản phẩm</h2>
<form action="sp.php" method="post">
    <input type="text" name="maSP" placeholder="mã sản phẩm" /> <br>
    <input type="text" name="ten" placeholder="tên" /> <br>
    <input type="text" name="hinhanh" placeholder="hình ảnh" /> <br>
    <input type="text" name="gia" placeholder="giá" /> <br>
    <input type="text" name="danhmuc" placeholder="danh mục" /> <br>
    <button type="submit" name="xem ket qua">thêm sp</button>
</form>
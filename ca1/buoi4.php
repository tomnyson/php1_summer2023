<?php

$sinhviens = array('nguyen van a', 'nguyen van b', 'nguyen van c');
var_dump(count($sinhviens));
printf($sinhviens[0]); // nva
// printf($sinhviens[3]); 
echo "<ul>";
?>
<ul>
    <?php for ($i = 0; $i < count($sinhviens); $i++) { ?>
    <li><?php echo $sinhviens[$i] ?></li>
    <?php } ?>
</ul>
<?php
$mangLK = array('mk001' => 'nguyen van a', 'mk002' => 'nguyen van b', 'mk003' => 'nguyen van c');
$sinhvien = array(
    'mssv' => 'mk001',
    'ten' => 'nguyen van a',
    'toan' => 8,
    'van' => 7,
    'anh' => 9
);
$lop = array(
    array(
        'mssv' => 'mk001',
        'ten' => 'nguyen van a',
        'toan' => 8,
        'van' => 7,
        'anh' => 9
    ),
    array(
        'mssv' => 'mk002',
        'ten' => 'nguyen van a',
        'toan' => 8,
        'van' => 7,
        'anh' => 9
    )
);

// $lop = array(
//     'mk001' => array(
//         'ten' => 'nguyen van a',
//         'toan' => 8,
//         'van' => 7,
//         'anh' => 9  
//     ),
//     'mk002' => array(
//         'ten' => 'nguyen van b',
//         'toan' => 8,
//         'van' => 7,
//         'anh' => 9  
//     ),

// )
// foreach ($mangLK as $item) {
//     echo "$item <br>";
// }
// foreach ($mangLK as $index => $value) {
//     echo "mssv=$index, ten=$value <br>";
// }
// for ($i = 0; $i < count($sinhvien); $i++) {
//     var_dump($sinhvien['mssv']);

/**
 * tạo một mảng sp(maSP, ten, hinhanh, gia, danhmuc)
 * tạo một list sản phẩm 
 */

$newSv =  array(
    'mssv' => 'mk003',
    'ten' => 'nguyen van c',
    'toan' => 8,
    'van' => 7,
    'anh' => 9
);
array_push($lop, $newSv);
// $lop[] = $newSv;
foreach ($lop as $sinhvien) {
    echo "----------------BEGIN---------------------<br>";
    echo "<p>mssv:" . $sinhvien['mssv'] . "</p><br>";
    echo "<p>ten:" . $sinhvien['ten'] . "</p><br>";
    echo "<p>toan:" . $sinhvien['toan'] . "</p><br>";
    echo "<p>van:" . $sinhvien['van'] . "</p><br>";
    echo "<p>anh:" . $sinhvien['anh'] . "</p><br>";
    echo "----------------END--------------------- <br>";
}
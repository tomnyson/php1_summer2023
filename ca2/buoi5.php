<?php

function checkSo($so = 0)
{
    return $so % 2;
}

if (checkSo(4) == 0) {
    echo "chan";
} else {
    echo "le";
}

$shopping = array(
    array('ma' => 1, 'ten' => 'iphone X', 'gia' => 120000000, 'soluong' => 1),
    array('ma' => 2, 'ten' => 'iphone XI', 'gia' => 140000000, 'soluong' => 3),
    array('ma' => 3, 'ten' => 'iphone XII', 'gia' => 31000000, 'soluong' => 2),
    array('ma' => 4, 'ten' => 'iphone XIII', 'gia' => 30000000, 'soluong' => 5),
);
$GLOBALS['cars'] = $shopping;
/**
 * 1. xây dựng hàm kiểm tra sản phẩm đã tồn tại chưa dựa vào mã
 * 2. xây dựng chức năng thêm sản phẩm vài giỏ hàng
 *  => ma phải duy nhất, nếu mã đã có tiền hành cập nhật lại sp hiện tại
 * 3. xóa 1 sản phẩm trong giỏ hàng
 * 4. tính tổng tiền của giỏ hàng
 */

function isExistSanPhamByMa($ma)
{
    foreach ($GLOBALS['cars'] as $item) {
        if ($item['ma'] === intval($ma)) {
            echo "sp ton tai";
            return true;
        }
    }
    echo "sp ko ton tai";
    return false;
}

function printBeautify($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function addItem($ma, $ten, $gia, $soluong)
{
    if (isExistSanPhamByMa($ma)) {
        //cap nhat;
        $sp = array('ma' => $ma, 'ten' => $ten, 'gia' => $gia, 'soluong' => $soluong);
        $GLOBALS['cars'][3] = $sp;
        foreach ($GLOBALS['cars'] as $index => $item) {
            if ($item['ma'] === intval($ma)) {
                $GLOBALS[$index] = $item;
                return true;
            }
        }
    } else {
        $sp = array('ma' => $ma, 'ten' => $ten, 'gia' => $gia, 'soluong' => $soluong);
        array_push($GLOBALS['cars'], $sp);
        return true;
    }
}

isExistSanPhamByMa(1);
addItem(4, 'iphone XXXXX', 20000000, 10);
printBeautify($GLOBALS['cars']);

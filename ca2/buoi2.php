<?php
// $a = 3;
// echo "<h2>ket qua </h2> </br>";
// echo ($a += 2) . "</br>";
// echo ($a *= 2) . "</br>";
// echo ($a /= 2) . "</br>";
// echo ($a *= 3) . "</br>";
// /**
//  * logic
//  * tạo ra các ví dụ về and => true | false
//  * or -> true | false
//  */

// $bieuThuc1 = (1 > 2);
// $bieuThuc2 =  (3 > 2);

// echo ($bieuThuc1 && $bieuThuc2) . "</br>";
// echo ($bieuThuc1 || $bieuThuc2) . "</br>";

// /**
//  * if else
//  * nhập vào một số kiểm tra chẵn lẻ
//  */

// $a = 1;
// $b = 2;
// if ($a >= $b) {
//     echo "ket qua: $a >=$b";
// } else {
//     echo "ket qua: $b > $a";
// }

if (isset($_POST["so"])) {
    if (is_numeric($_POST["so"])) {
        $so = $_POST["so"];
        if ($so % 2 == 0) {
            echo "so chan";
        } else {
            echo "so le";
        }
    } else {
        echo "mời nhập lại";
    }
}
/**
 * 
 * nhập vào 1 năm kiểm tra năm nhuần (x%400 || (x%4 ==0 && x%100 != 0))
 * nhập vào năm sinh của bạn kiểm tra xem đủ điều kiện thi giấy phép lái xe chưa >=18
 * php get year -> nam hien tai - nam sinh -> tuoi
 * nhâp vào 3 cạnh a, b, c kiểm tra xem 3 cạnh có thỏa mãn là 1 tam giác ko?
 * (a+b > c || a+c > b || b+c>a)
 */
?>

<form action="./buoi2.php" method="post">
    <input type="text" placeholder="nhap gia tri" name="so" />
    <input type="submit" value="submit" />
</form>
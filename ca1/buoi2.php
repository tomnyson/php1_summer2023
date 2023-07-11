<?php

use function PHPSTORM_META\type;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 *  toán tử gắn
 */
// $soThu1 = 1;
// // $soThu2 = 4;
// $soThu1 += 2; // $soThu1 = $soThu1 + 2;
// echo "<h1>" . $soThu1 . "<h1></br>";
// $soThu1 -= 2; // $soThu1 = $soThu1 - 2;
// echo "<h1>" . $soThu1 . "<h1></br>";

// $soThu1 *= 2; // / $soThu1 = $soThu1 * 2;
// echo "<h1>" . $soThu1 . "<h1></br>";
// $soThu1 %= 2; // $soThu1 = $soThu1 % 2;
// echo "<h1>" . $soThu1 . "<h1></br>";
// // toán tử logic (>, <, >=, <=, ==, !=) => return true false

// define("MAX", 100);
// define("MIN", 1);
// $a = 1;
// $b = "1";
// echo "so sánh </br>";
// echo $a < $b; // true |1
// echo "</br>";
// echo "ket qua" . ($a >= $b);
// echo "</br>";
// echo "ket qua" . ($a === $b);
// echo gettype($a);
// echo gettype($b);

// && || lấy 4 ví dụ về trường hợp true, false of && ||
// ++, -- =>
// câu điều kiện -> if/ else

$soA = 5;
$soB = 3;

if ($soA > $soB) {
    echo "$soA lớn hơn $soB";
} else {
    echo "$soA bé hơn $soB";
}

// biến tuổi nếu đủ 16 tuổi thì được lái xe > ko đc lái xe

?>

<form action="buoi2.php" method="post">
    <input type="text" name="tuoi" placeholder="nhap tuoi" />
    <button type="submit" name="xem ket qua">xem ket qua</button>
</form>
<?php
// isset kiểm tra giá trí đã được khởi tạo chưa
// $_POST lấy giá trị từ form gửi về.
/**
 * nhập vào một số -> kiểm tra chẵn lẻ và in kết quả ra
 */

if (isset($_POST['tuoi'])) {
    //is_numeric =>
    if (is_numeric($_POST['tuoi'])) {
        $tuoi = $_POST["tuoi"];
        echo "tuoi ban la $tuoi";
    } else {
        echo "mời nhập lại";
    }
}
//Nhập vào độ dài ba cạnh của một tam giác từ người dùng a,b,c kiểm tra tam giác có hợp lệ hay không
// nhập vào 1 năm kiểm tra nhuận hay ko nhuận
?>
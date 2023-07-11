<!-- đỏ, cam, vàng, lục, lam, chàm, tím. -->
<form action="./buoi3.php" method="post">
    <label>mời bạn chọn màu yêu thích</label> </br>
    <select name="color">
        <option value="do">đỏ</option>
        <option value="cam">cam</option>
        <option value="vang">vàng</option>
        <option value="lam">lam</option>
        <option value="cham">chàm</option>
        <option value="tim">tím</option>
    </select>
    <input type="submit" value="submit" />
</form>

<?php
if (isset($_POST['color'])) {
    $color = $_POST["color"];
    var_dump($_POST);
    switch ($color) {
        case "do":
            echo "<div style='width: 50px; height: 50px; background: red'></div>";
            break;
        case "cam":
            echo "<div style='width: 50px; height: 50px; background: red'></div>";
            break;
        case "vang":
            echo "<div style='width: 50px; height: 50px; background: red'></div>";
            break;
        case "cham":
            echo "<div style='width: 50px; height: 50px; background: red'></div>";
            break;
        case "tim":
            echo "<div style='width: 50px; height: 50px; background: red'></div>";
            break;
        default:
            echo "lua chon sai";
            break;
    }
}

?>
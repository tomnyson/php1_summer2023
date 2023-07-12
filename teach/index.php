<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Management System</title>
</head>

<body>
    <h1>Student Management System</h1>

    <h2>Add Student</h2>
    <form action="add_student.php" method="post">
        <input type="text" name="ma" placeholder="ID" required>
        <input type="text" name="ten" placeholder="ten" required>
        <input type="number" name="gia" placeholder="gia" required>
        <input type="submit" value="Add Student">
    </form>

    <h2>Student List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ma</th>
            <th>ten</th>
            <th>gia</th>
            <th>Action</th>
        </tr>
        <?php

        if (isset($_SESSION['sanpham'])) {
            $lop = $_SESSION['sanpham'];
            foreach ($lop as $index => $sp) {
                echo "<tr>";
                echo "<td>" . $index . "</td>";
                echo "<td>" . $sp['maSP'] . "</td>";
                echo "<td>" . $sp['ten'] . "</td>";
                echo "<td>" . $sp['gia'] . "</td>";
                echo "<td><a href='edit_student.php?maSP=" . $sp['maSP'] . "'>Edit</a> | <a href='delete_student.php?maSP=" . $sp['maSP'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        }

        ?>
    </table>
</body>

</html>
<?php session_start();

?>
<html>

<head>
    <title>dashboard</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['isLogin'])) {

        header('location:login.php');
    } else {
        $isLogin = $_SESSION['isLogin'];
    }

    ?>
    <h1>bạn đã login</h1>
    <h1><?php echo $isLogin; ?></h1>
</body>

</html>
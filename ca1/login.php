<?php session_start();

if (!isset($_SESSION['users'])) {
    $users = array(
        array('username' => 'admin', 'password' => '123456', 'role' => 'admin'),
        array('username' => 'admin1', 'password' => '123456', 'role' => 'admin'),
        array('username' => 'admin2', 'password' => '123456', 'role' => 'admin'),
        array('username' => 'admin4', 'password' => '123456', 'role' => 'admin'),
    );
    $_SESSION['users'] = $users;
}
?>
<html>

<head>
    <title>login</title>
</head>

<body>
    <h2>login page</h2>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <input type="submit" name="login" value="login" />
    </form>
    <?php
    // dafault => username = admin, password = 123456
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];
        if ($user === 'admin' && $password == '123456') {
            if (!isset($_SESSION['isLogin'])) {
                $users = $_SESSION['users'];
                array_push($users, array('username' => $user, 'password' => $password));
                $_SESSION['users'] = $users;
                var_dump($users);
                $_SESSION['isLogin'] = true;
            }
            // header('Location: dashboard.php');
        }
        $users = $_SESSION['users'];
        array_push($users, array('username' => $user, 'password' => $password));
        $_SESSION['users'] = $users;
        var_dump($users);
    }
    ?>
</body>

</html>
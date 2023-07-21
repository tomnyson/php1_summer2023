<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <?php
    require_once("./provider.php");
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $errors = [];
        if ($username === "") {
            $errors[] = "username not empty";
        }
        if ($password === "") {
            $errors[] = "password not empty";
        }
        if (count($errors) === 0) {
            // check user da tonn tai chua
            $sql_check = 'SELECT * FROM users where username = :username';
            $statement1 = $connection->prepare($sql_check);
            $result = $statement1->setFetchMode(PDO::FETCH_ASSOC);
            $statement1->execute([
                ':username' => $username
            ]);
            $count = $statement1->rowCount();
            if ($count > 0) {
                // kt khop mat khau
                $currentUser = $statement1->fetchAll()[0];
                if (password_verify($password, $currentUser['password'])) {
                    //xu ly dang nhap thanh cong
                } else {
                    $errors[] = "Username or password  not correct";
                }
            } else {
                $errors[] = "Username or password  not correct";
            }
        }
    }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>LOGIN</h2>
                <?php
                if (isset($errors) && count($errors) > 0) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($errors as $error) {
                        echo $error . "</br>";
                    }
                    echo '</div>';
                }
                ?>
                <form action="./login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
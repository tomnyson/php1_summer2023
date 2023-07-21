<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once("./provider.php");
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        /**
         * us -> not empty
         *  password => >6 ky tu
         *  email hop le
         */
        $errors = [];
        if (strlen($username) < 1) {
            $errors[] =  "username not empty";
        }
        if (strlen($password) < 6) {
            $errors[] =  "password not empty and > 6 ky tu";
        }
        if (isset($connection) && count($errors) < 1) {
            // insert
            try {
                $sql = "SELECT * FROM users where username = :username";
                $statement1 = $connection->prepare($sql);
                $statement1->execute([
                    ':username' => $username,
                ]);
                $result = $statement1->setFetchMode(PDO::FETCH_ASSOC);
                $result1 = $statement1->fetchAll();
                var_dump($result1);
                $user = $statement1->rowCount();
                var_dump($user);
                if ($user > 0) {
                    $currentPass = $result1[0]['password'];
                    echo "currentPass" . $currentPass;
                    die();
                    if (password_verify($password, $currentPass)) {
                        echo "LOGIN";
                        die;
                    } else {
                        array_push($errors, "Username or password invalid");
                    }
                    // xu ly login
                } else {
                    array_push($errors, "Username or password invalid");
                }
            } catch (Exception $err) {
                echo $err->getMessage();
            }
        }
    }

    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login</h2>
                <?php
                if (isset($errors) &&   count($errors) > 0) { ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo join("<br/>", $errors) . ""; ?>
                    </div>
                <?php }
                ?>
                <?php
                if (isset($message)) { ?>

                    <div class="alert alert-success" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <form action="./login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button> <br>
                    <a href="./register.php">create new account</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
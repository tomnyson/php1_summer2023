<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <?php
    require_once("./provider.php");
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $errors = [];
        if ($username === "") {
            $errors[] = "username not empty";
        }
        if ($password === "") {
            $errors[] = "password not empty";
        }

        if (strlen($password < 6)) {
            $errors[] = "password must great than 6 character";
        }
        // validate email from php function
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "email not invalid";
        }
        if (count($errors) === 0) {
            // insert
            $sql = 'INSERT INTO users(username, password, role) VALUES(:username, :password, :role)';
            $statement = $connection->prepare($sql);
            if ($statement->execute([
                ':username' => $username,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ":role" => 1,
                ":email" => $email
            ])) {
                echo "success create a user";
            }
        }
    }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Register</h2>
                <?php
                if (isset($errors) && count($errors) > 0) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($errors as $error) {
                        echo $error . "</br>";
                    }
                    echo '</div>';
                }
                ?>
                <form action="./register.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="password">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
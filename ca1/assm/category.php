<!doctype html>
<html lang="en">
<?php
require_once('./User.php');
session_start();
if (!isset($_SESSION['currentUser']) || $_SESSION['currentUser']->role !== '1') {
    header('Location: login.php');
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="./css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/dashboard.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            include_once('./layout/nav.php');
            include_once('./layout/sidebar.php');
            include_once('./provider.php');

            if (isset($_POST['name'])) {

                $error = "";
                $message = "";
                $sql = "SELECT * FROM categories where name= :name";
                $statement = $connection->prepare($sql);
                $statement->execute([
                    ':name' => trim($_POST['name']),
                ]);
                $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
                $result1 = $statement->fetchAll();
                $numCategory = $statement->rowCount();

                if ($numCategory > 0) {
                    $error = "category name is existed";
                } else {

                    $sql1 = "INSERT INTO categories( name ) VALUES( :name )";
                    $statement1 = $connection->prepare($sql1);
                    // var_dump($sql1);
                    // die;
                    if ($statement1->execute([':name' => trim($_POST['name'])])) {
                        $message = "create success";
                    }
                }
            }
            ?>
            <div class="col col-lg-10">
                <h4>list category</h4>
                <form action="./category.php" method="POST" class="form">
                    <input type="text" class="form-control" name="name" placeholder="enter name" />
                    <button type="submit" class="btn btn-success">create</button>
                </form>
                <?php
                if (isset($error) && $error !== "") {
                    echo " <div class='alert alert-danger' role='alert'>
                            $error
                     </div>";
                }
                if (isset($message) &&  $message !== "") {
                    echo " <div class='alert alert-success' role='alert'>
                            $message
                     </div>";
                }
                ?>
                <table class="table table-striped"">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>action</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>iphone</td>
                            <td>
                                <button type=" button" class="btn btn-danger">delete</button>
                    <button type="button" class="btn btn-success">edit</button>
                    </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                    crossorigin="anonymous">
                    </script> -->
</body>

</html>
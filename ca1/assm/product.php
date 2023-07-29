<!doctype html>
<html lang="en">
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['currentUser'])) {
    $user = unserialize($_SESSION['currentUser']);
    if ($user->role != '1') {
        header('Location: login.php');
        exit;
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
                $id = $_POST['id'] ?? null;
                $error = "";
                $message = "";
                if (empty($id)) {
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
                } else {
                    $sql1 = "UPDATE categories SET name = :name where id = :id";
                    $statement1 = $connection->prepare($sql1);
                    // var_dump($sql1);
                    // die;
                    if ($statement1->execute([
                        ':name' => trim($_POST['name']),
                        'id' => intval($id)
                    ])) {
                        $message = "update success";
                    }
                }
            }
            ?>
            <div class="col col-lg-10">
                <h4>list products</h4>
                <a href="./product-create.php" class="btn btn-primary">create</a>

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

                $sql = "SELECT * FROM categories";
                $statement = $connection->prepare($sql);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute();
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
                    <?php foreach ($statement->fetchAll() as $category) { ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td>
                            <a style=" color: red" href=" ./delete-catagory.php?id=<?= $category['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                    </svg>
                    </a>
                    <button type="button" onclick="updateCat(<?= $category['id'] ?>,'<?= $category['name'] ?>')" class="btn btn-success edit-cat">edit</button>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
    <!-- <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                    crossorigin="anonymous">
                    </script> -->
</body>

</html>
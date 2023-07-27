<!doctype html>
<html lang="en">
<?php
require('./provider.php');
include('./layout/header.php')

?>

<body>
    <div class="container">
        <div class="row">
            <?php
            include('./layout/nav.php');
            include('./layout/sidebar.php');
            ?>

            <div class="col col-lg-10">
                <form class="form-inline form" action="" method="POST">
                    <input type="text" class="form-control" name="name" placeholder="input name category">
                    <button type="submit" class="btn btn-primary mb-2">save</button>
                </form>
                <?php
                if (isset($_POST['name'])) {
                    $message = "";
                    $sql = "SELECT * FROM categories where name = :name";
                    $statement = $connection->prepare($sql);
                    $statement->execute([
                        ':name' => $_POST['name'],
                    ]);
                    $count = $statement->rowCount();

                    if ($count > 0) {
                        $message = "<span class='text text-danger'>catagory name already exists</span>";
                    } else {
                        $sql = "INSERT INTO categories (name) VALUES (:name)";
                        $statement = $connection->prepare($sql);
                        if ($statement->execute([
                            ':name' => $_POST['name'],
                        ])) {

                            $message = "<span  class='text text-success'>created successfully</span>";
                        }
                    }
                }
                if (isset($message) && $message !== '') {
                    echo $message;
                }
                $sql_all = "SELECT * FROM categories";
                $statement = $connection->prepare($sql_all);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute();
                $categories = $statement->fetchAll();
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) { ?>
                        <tr>
                            <th scope="row"><?php echo $category['id'];  ?></th>
                            <td><?php echo $category['name'];  ?></td>
                            <td>
                                <button class="btn btn-primary">edit</button>
                                <a class="btn btn-danger"
                                    href="./delete-category.php?id=<?php echo $category['id'];  ?>">delete</a>
                            </td>
                        </tr>
                        <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script> -->
</body>

</html>
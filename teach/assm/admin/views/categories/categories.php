<!doctype html>
<html lang="en">
<?php
require(__DIR__ . '/../../includes/header.php')
?>

<body>
    <div class="container">
        <div class="row">
            <?php
            require(__DIR__ . '/../../includes/nav.php');
            require(__DIR__ . '/../../includes/sidebar.php')
            ?>

            <div class="col col-lg-10">
                <h4>list category</h4>
                <form action="./category.php" method="POST" class="form">
                    <input type="text" class="form-control" name="name" placeholder="enter name" />
                    <button type="submit" name="action" value="create" class="btn btn-success">create</button>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) { ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td>
                                <form style="display: inline-block " action="./category.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                                <button id="editCat" type="button" data-category-id="<?= $category['id'] ?>"
                                    data-category-name="<?= $category['name'] ?>" class="btn btn-success"
                                    data-toggle="modal" data-target="#editCategoryModal">edit</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    require(__DIR__ . '/../../views/categories/modal-category.php');
    require(__DIR__ . '/../../includes/footer.php');

    ?>

</body>

</html>
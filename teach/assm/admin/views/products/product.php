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
                <h4>List Products</h4>
                <div class="filter">
                    <form action="./category.php" method="POST" class="form">
                        <input type="text" class="form-control" name="name" placeholder="enter name" />
                        <button type="submit" name="action" value="create" class="btn btn-success">Search</button>
                    </form>
                    <a class="btn btn-success" href="./index.php?route=productController&action=create">create<a>
                </div>

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

                <div class="row">
                    <span>categories:</span>
                    <ul class="tag-list">
                        <?php foreach ($categories as $category) : ?>
                        <a class="list-group-item tag"
                            href="product.php?catId=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                        <?php endforeach; ?>
                    </ul>
                    <?php foreach ($products as $product) : ?>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card h-100">
                            <img class="card-img-top image-product" src="<?php echo BASE_URL . $product['image']; ?>"
                                alt="<?php echo $product['name']; ?>">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo $product['name']; ?>
                                </h4>
                                <h5>$<?php echo $product['price']; ?></h5>
                                <div class="edit-delete-icons">
                                    <a href="index.php?route=productController&action=update&id=<?php echo $product['id']; ?>"
                                        class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="route=productController&action=delete&id=<?php echo $product['id']; ?>"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
        // require(__DIR__ . '/../../includes/modal-category.php');
        require(__DIR__ . '/../../includes/footer.php');
        ?>

</body>

</html>
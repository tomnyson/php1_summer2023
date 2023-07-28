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

                <form action="./index.php?route=productController&action=save" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $product['name'] ?? ""; ?>"
                            class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" class="form-control"
                            value="<?php echo $product['price'] ?? 0; ?>" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="preview">
                        <img class="card-img-top image-product" src="<?php echo BASE_URL . $product['image']; ?>"
                            alt="<?php echo $product['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="">Select a Category</option>
                            <!-- Assuming $categories is an array of categories fetched from your database -->
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['id'] ?>"
                                <?php if ($category['id'] == $product['category_id']) echo 'selected'; ?>>
                                <?php echo $category['name'] . " "; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="action" value="update" class="btn btn-primary">Save Change</button>
                </form>

            </div>
        </div>
    </div>
    <?php
    // include('./modal-category.php');
    require(__DIR__ . '/../../includes/footer.php');
    ?>

</body>

</html>
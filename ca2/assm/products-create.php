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

            $sql_all = "SELECT * FROM categories";
            $statement = $connection->prepare($sql_all);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            $categories = $statement->fetchAll();
            if (
                isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) &&
                isset($_POST['description']) && isset($_POST['category']) && isset($_FILES['image'])
            ) {
                $name = trim(htmlspecialchars($_POST['name']));
                $price = trim(htmlspecialchars($_POST['price']));
                $description = trim(htmlspecialchars($_POST['description']));
                $category = trim(htmlspecialchars($_POST['category']));
                $image = $_FILES['image'];
                $errors = [];
                if (empty($name)) {
                    $errors[] = 'Name must not be empty';
                }
                if (empty($price)) {
                    $errors[] = 'price must not be empty';
                }
                if (!empty($price) && !is_numeric($price)) {
                    $errors[] = 'price is number';
                }
                if (empty($description)) {
                    $errors[] = 'description must not be empty';
                }
                if (empty($category)) {
                    $errors[] = 'description must not be empty';
                }

                if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                    // co hinh

                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check == false) {
                        $errors[] = "file not supported";
                        $uploadOk = 0;
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $errors[] = "file is existed";
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["image"]["size"] > 500000) {
                        $errors[] = "file is too larger";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        $errors[] = "file extent not support";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $errors[] = "upload failed";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $image = htmlspecialchars(basename($_FILES["image"]["name"]));
                        } else {
                            $errors[] = "upload failed";
                        }
                    }
                }
            }
            var_dump($errors)
            ?>


            <div class="col col-lg-10">
                <h4>create product</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="">Select a Category</option>
                            <!-- Assuming $categories is an array of categories fetched from your database -->
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" name="action" value="create" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script> -->
    <script>
        updateCat = (id, name) => {
            console.log(id, name)
            const elmId = document.getElementById('id');
            const elmName = document.getElementById('name');
            elmId.value = id;
            elmName.value = name;
        }
    </script>
</body>

</html>
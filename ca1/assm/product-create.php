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

            $sql = "SELECT * FROM categories";
            $statement = $connection->prepare($sql);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            $categories = $statement->fetchAll();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['name']) &&
                    isset($_POST['price']) && isset($_POST['description']) &&
                    isset($_POST['category'])
                ) {
                    $name = trim(htmlspecialchars($_POST['name']));
                    $price = trim(htmlspecialchars($_POST['price']));
                    $category_id = trim(htmlspecialchars($_POST['category']));
                    $description = trim(htmlspecialchars($_POST['description']));
                    $image = "";
                    $errors = [];
                    if (empty($name)) {
                        $errors[] = "Name must not be empty";
                    }
                    if (empty($price)) {
                        $errors[] = "Price must not be empty";
                    }
                    if (!is_numeric($price)) {
                        $errors[] = "Price must not be  number";
                    }
                    if (empty($category_id)) {
                        $errors[] = "Category must not be  empty";
                    }
                    if (empty($description)) {
                        $errors[] = "Description must not be  empty";
                    }
                    if (isset($_FILES['image'])) {
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($check == false) {
                            $errors[] = "File is not an image.";
                        }
                        // Check if file already exists
                        if (file_exists($target_file)) {
                            $errors[] = "File is image is exist.";
                            $uploadOk = 0;
                        }
                        // Check file size
                        if ($_FILES["image"]["size"] > 500000) {
                            $errors[] = "size too large";
                            $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            $errors[] = "type image not supported";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            $errors[] = "image invalid";
                        } else {
                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                $image =  htmlspecialchars(basename($_FILES["image"]["name"]));
                            } else {
                                $errors[] = "image invalid";
                            }
                        }
                    }
                }
            }
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
                        <label for="name">Description:</label>
                        <textarea type="text" id="description" name="description" class="form-control" required></textarea>
                    </div>
                    <button style="margin-top: 20px" type="submit" name="action" value="create" class="btn btn-primary">Save</button>
                </form>
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
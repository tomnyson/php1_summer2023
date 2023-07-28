<?php
require(__DIR__ . '/../models/ProductModel.php');
class ProductController
{
    public $productModel;

    function __construct()
    {
        global $connection;
        $this->productModel = new ProductModel($connection);
    }

    public function index()
    {
        // Fetch the data

        $products = $this->productModel->getProducts();

        // Load the list view
        $this->loadView('products/product', [
            'products' => $products,
            'categories' => $this->productModel->getCategories()
        ]);
    }

    public function create()
    {
        // Load the create view
        $products = $this->productModel->getProducts();
        $this->loadView('products/product-create', [
            'products' => $products,
            'categories' => $this->productModel->getCategories()
        ]);
    }

    public function update()
    {
        $id = $_GET['id'] ?? null;

        if ($this->isValidProductId($id)) {
            $product = $this->productModel->getProduct(intval($id));
            $this->loadView('products/product-edit', [
                'product' => $product,
                'categories' => $this->productModel->getCategories()
            ]);
        } else {
            $this->index();
        }
    }

    private function isValidProductId($id)
    {
        return isset($id) && is_numeric($id);
    }


    function validate($name, $price, $category, $image)
    {
        $errors = [];
        // Validate name
        if (empty($name) || strlen($name) > 50) {
            $errors[] = 'Product name is required and must be less than 50 characters';
        }

        // Validate price
        if (empty($price) || !is_numeric($price) || $price < 0) {
            $errors[] = 'Price is required and must be a positive number';
        }

        // Validate category
        if (empty($category) || !is_numeric($category)) {
            $errors[] = 'Category is required and must be a number';
        }

        // Validate image
        if (isset($image) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $allowed = ['gif', 'png', 'jpg'];
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $errors[] = 'Invalid file type for image. Allowed types: ' . implode(', ', $allowed);
            }
            if ($image["size"] > 500000) {
                $errors[] = "Image is too large";
            }
        }

        return $errors;
    }

    private function processFormData()
    {
        $name = trim(htmlspecialchars($_POST['name']));
        $price = trim(htmlspecialchars($_POST['price']));
        $category_id = trim(htmlspecialchars($_POST['category']));
        $errors = $this->validate($name, $price, $category_id, $_FILES['image']);
        $image = '';
        if (isset($_FILES['image'])) {
            $image = uploadImage($_FILES['image']);
        }

        return [$errors, $name, $price, $image, $category_id];
    }

    public function save()
    {
        $message = '';
        $error = '';
        $products = $this->productModel->getProducts();
        $categories = $this->productModel->getCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            list($errors, $name, $price, $image, $category_id) = $this->processFormData();

            if (count($errors) > 0) {
                $error = implode('', $errors);
            } else if ($this->productModel->createProduct($name, $price, $image, $category_id)) {
                $message = "Product created successfully";
            } else {
                $error = "Failed to create product";
            }
        }

        $this->loadView('products/product-create', compact('products', 'categories', 'message', 'error'));
    }

    // public function edit($id)
    // {
    //     // Fetch the data
    //     $product = $this->productModel->getProduct($id);

    //     // Load the edit view
    //     $this->loadView('products/edit', ['product' => $product]);
    // }

    public function loadView($viewName, $params = [])
    {
        // Extract the array elements as variables
        extract($params);

        // Load the view
        require ROOT_PATH . "/admin/views/{$viewName}.php";
    }
}
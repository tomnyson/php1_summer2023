<?php

class ProductModel
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createProduct($name, $price, $image, $category_id)
    {
        $sql = "INSERT INTO products (name, price, image, category_id, created_at) VALUES (:name, :price, :image, :category_id, :created_at)";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([
            ':name' => $name,
            ':price' => $price,
            ':image' => $image,
            ':category_id' => $category_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function updateProduct($id, $name, $price, $image, $category_id)
    {
        $currentProduct = $this->getProduct($id);
        $sql = "UPDATE products SET name = :name, price = :price, image = :image, category_id = :category_id WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $imageToUse = !empty($image) ? trim(htmlspecialchars($image)) : $currentProduct['image'];
        var_dump($imageToUse);
        return $statement->execute([
            ':id' => trim($id),
            ':name' => trim(htmlspecialchars($name)),
            ':price' => trim(htmlspecialchars($price)),
            ':image' => $imageToUse,
            ':category_id' => trim(htmlspecialchars($category_id))
        ]);
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM products where id= :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function validate($name, $price, $category, $image)
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
}
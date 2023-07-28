<?php

class CategoryModel
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getCategoryByName($name)
    {
        $sql = "SELECT * FROM categories where name= :name";
        $statement = $this->connection->prepare($sql);
        $statement->execute([':name' => trim($name)]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCategory($name)
    {
        $sql = "INSERT INTO categories(name) VALUES(:name)";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([':name' => trim($name)]);
    }

    public function updateCategory($id, $name)
    {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([':id' => $id, ':name' => trim(htmlspecialchars($name))]);
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([':id' => $id]);
    }
}
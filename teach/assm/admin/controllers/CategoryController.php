<?php

require_once(__DIR__ . '/../models/CategoryModel.php');
class CategoryController
{
    public $categoryModel;
    function __construct()
    {
        global $connection;
        var_dump($connection);
        $this->categoryModel
            = new CategoryModel($connection);;
    }

    public function index()
    {
        // Load the list view
        $this->loadView('categories/categories', [
            'categories' => $this->categoryModel->getCategories()
        ]);
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            $name = $_POST['name'];
            $id = $_POST['id'] ?? null;
            if ($id) {
                //case update
                if ($this->categoryModel->getCategories()) {
                }
            } else {
                if ($this->categoryExists($name)) {
                    $error = "category name is existed";
                } else if ($this->createCategory($name)) {
                    $message = "create success";
                }
            }
            if ($this->categoryExists($name)) {
                $error = "category name is existed";
            } else if ($this->createCategory($name)) {
                $message = "create success";
            }
        }
        $this->loadView('categories/categories', ['categories' => $this->getAllCategories()]);
    }

    private function categoryExists($name)
    {
        return count($this->categoryModel->getCategoryByName($name)) > 0;
    }

    private function createCategory($name)
    {
        return $this->categoryModel->createCategory($name);
    }

    private function getAllCategories()
    {
        return $this->categoryModel->getCategories();
    }

    public function loadView($viewName, $params = [])
    {
        // Extract the array elements as variables
        extract($params);

        // Load the view
        require ROOT_PATH . "/admin/views/{$viewName}.php";
    }
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['action']) && $_POST['action'] === 'create' && isset($_POST['name'])) {
//         $categories = $category->getCategoryByName($_POST['name']);

//         if (count($categories) > 0) {
//             $error = "category name is existed";
//         } else if ($category->createCategory($_POST['name'])) {
//             $message = "create success";
//         }
//     }

//     if (isset($_POST['action']) && $_POST['action']  === 'update') {
//         if (isset($_POST['name']) && isset($_POST['id']) && $category->updateCategory(intval($_POST['id']), $_POST['name'])) {
//             $message = "update success";
//         } else {
//             $error = "update failed";
//         }
//     }

//     if (isset($_POST['action']) && $_POST['action']  === 'delete') {
//         if (isset($_POST['id']) && $category->deleteCategory(intval($_POST['id']))) {
//             $message = "delete success";
//         } else {
//             $error = "delete failed";
//         }
//     }
// }

// $categories = $category->getCategories();
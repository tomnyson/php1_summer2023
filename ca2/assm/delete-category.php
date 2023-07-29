<?php
session_start();
require('./provider.php');
if (isset($_GET['id'])) {
   $sql = "DELETE FROM categories where id=:id";
   $statement = $connection->prepare($sql);
   if ($statement->execute([
      ':id' => intval($_GET['id']),
   ])) {
      header('Location: categories.php');
      $_SESSION['message'] = "delete successfully with id={$_GET['id']}";
      exit;
   }
}

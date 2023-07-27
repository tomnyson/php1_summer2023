<?php
require('./user.php');
session_start();
if (!isset($_SESSION['currentUser']) || $_SESSION['currentUser']->role != '1') {
    header('Location: login.php');
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="./css/bootstrap.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
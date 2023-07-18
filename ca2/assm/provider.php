<?php
define("HOST", "localhost");
define("DB_NAME", "php1_ca2");
define("USERNAME", "root");
define("PASSWORD", "");
$connection = NULL;
try {
    $url = "mysql:host=" . HOST . ";dbname=" . DB_NAME . "";
    $connection = new PDO($url, USERNAME, PASSWORD);
    var_dump($url);
    echo "success";
} catch (ErrorException $error) {
    echo $error;
}

<?php

$users = array(
    array('username' => 'admin', 'password' => '123456', 'role' => 'admin'),
    array('username' => 'admin1', 'password' => '123456', 'role' => 'admin'),
    array('username' => 'admin2', 'password' => '123456', 'role' => 'user'),
    array('username' => 'admin4', 'password' => '123456', 'role' => 'user'),
);
$GLOBALS['users'] = $users;

// xây dựng 1 hàm kt login
// funtion them moi 1 user
// function xoa 1 user
// function cap nhat 1 user

function isCheckLogin($username, $password)
{

    foreach ($GLOBALS['users'] as $user) {
        if ($user['username'] = $username && $user['password'] == $password) {
            echo "login success";
            return true;
        }
    }
    echo "login failed";
    return false;
}

function isExistUsername($username)
{

    foreach ($GLOBALS['users'] as $user) {
        if ($user['username'] = $username) {
            return true;
        }
    }
    return false;
}


isCheckLogin('admin1', '1234562');

function addUser($username, $password, $role = 'user')
{
    if (isExistUsername($username)) {
        echo "username ko duoc trung";
        return false;
    }
    $newUser = array('username' => $username, 'password' => $password, 'role' => $role);
    // thêm vào mảng users global variable
    $users = $GLOBALS['users'];
    array_push($users, $newUser);
    $GLOBALS['users'] = $users;
    return true;
}

function chia2So($a, $b)
{
    try {
        return $a / $b;
    } catch (Exception $e) {
        echo "error" . $e->getMessage();
    }
}

echo "<h1>" . chia2So(10, 0) . "</h1>";

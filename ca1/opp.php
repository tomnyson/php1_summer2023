<?php
class User
{
    private $username;
    public $password;
    public $role;

    function __construct($username, $password, $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    function get_username()
    {
        $this->username;
    }

    function set_username($username)
    {
        $this->username = $username;
    }
    
    function printUser()
    {
        echo "<h1>username: {$this->username}/password:
         {$this->password}/ role: {$this->role}</h1>";
    }
}

$user = new User('admin', 'password', 'role');
// $user->set_username("admin");
$user->printUser();

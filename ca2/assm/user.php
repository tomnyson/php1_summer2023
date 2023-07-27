<?php
class User
{
    public $id;
    public $username;
    public $role;

    function __construct($id, $username, $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }
}

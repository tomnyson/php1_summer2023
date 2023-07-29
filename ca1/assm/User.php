<?php

class User implements Serializable
{
    public $id;
    public $username;
    public $role;
    function  __construct($id, $username, $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }

    public function serialize()
    {
        return serialize([
            'username' => $this->username,
            'role' => $this->role,
            'id' => $this->id
        ]);
    }

    public function unserialize($data)
    {
        list($this->id, $this->username, $this->role) = unserialize($data);
    }
}

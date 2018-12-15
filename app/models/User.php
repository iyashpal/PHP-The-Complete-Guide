<?php


class User {
    protected $id;

    protected $name;

    protected $email;

    protected $password;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
}

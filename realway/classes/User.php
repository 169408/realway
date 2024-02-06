<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $company;

    public function __construct($id, $name, $email, $password, $company)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->company = $company;
    }

    public function addUser() {
        return "INSERT INTO users VALUES({$this->id}, \"{$this->name}\", \"{$this->email}\", \"{$this->password}\", \"{$this->company}\");";
    }


}
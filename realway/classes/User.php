<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $company;
    private $database;

    public function __construct($database)
    {
        $this->database = $database != null ? $database : new DatabaseConnection();
    }


    private function save() {
        if($this->id != null){
            return $this->database->getQuery("UPDATE users SET name = \"$this->name\", email = \"$this->email\", password = \"$this->password\", company = \"$this->company\" WHERE id = $this->id;");
        }
        return $this->database->getQuery("INSERT INTO users(name, email, password, company) VALUES (\"{$this->name}\", \"{$this->email}\", \"{$this->password}\", \"{$this->company}\");");
    }

    public function addUser($params) {
        $this->name = $params["name"];
        $this->email = $params["email"];
        $this->password = $params["password"];
        $this->company = $params["company"];

        $this->save();
    }


}
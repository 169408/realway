<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $company;
    private $avatar;
    private $database;

    public function __construct($database)
    {
        $this->database = $database != null ? $database : new DatabaseConnection();
    }


    private function save() {
        if($this->id != null) {
            return $this->database->fulfilQuery("UPDATE users SET name = ?, email = ?, password = ?, company = ? WHERE id = ?", [$this->name, $this->email, $this->password, $this->company, $this->id]);
        }
        return $this->database->fulfilQuery("INSERT INTO users (name, email, password, company) VALUES (?, ?, ?, ?);", [$this->name, $this->email, $this->password, $this->company]);
    }

    public function addUser($params) {
        $this->name = $params["name"];
        $this->email = $params["email"];
        $this->password = $params["password"];
        $this->company = $params["company"];

        $this->save();
    }

    public function updateUser($params) {
        $this->id = $params["id"];
        $this->name = $params["name"];
        $this->email = $params["email"];
        $this->password = $params["password"];
        $this->company = $params["company"];

        $this->save();
    }

    public function deleteUser($params) {
        $this->id = $params["id"];
        return $this->database->fulfilQuery("DELETE FROM users WHERE id = ?;", [$this->id]);
    }

    public function getUser($params) {
        $this->id = $params["id"];
        return $this->database->fulfilQuery("SELECT * FROM users WHERE id = ?;", [$this->id]);
    }

    public function loadUserAvatar($avatar, $id) {
        $type = $avatar["type"];
        $name = md5(microtime()).".".str_replace("image/", "", $type);
        $this->id = $id;
        $this->avatar = $name;
        $dir = "uploads/avatars/";
        $uploadfile = $dir.$name;

        if(move_uploaded_file($avatar["tmp_name"], $uploadfile)) {
            $this->database->fulfilQuery("UPDATE users SET avatar = ? WHERE id = ?;", [$this->avatar, $this->id]);
        } else {
            return false;
        }

        return true;
    }
}
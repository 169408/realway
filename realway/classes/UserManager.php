<?php

require_once "User.php";

class UserManager
{
    /** @var DatabaseConnection */
    private $database;

    private $users;

    public function __construct($database)
    {
        $this->database = $database;
        $this->users = [];
        $records = $this->database->getQuery("SELECT * FROM users;");
        while ($person = mysqli_fetch_assoc($records)) {
            array_push($this->users, $person);
        }
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    public function authorisationUser($params) {
        $name = $params["name"];
        $password = $params["password"];

        return $this->database->fulfilQuery("SELECT * FROM users WHERE BINARY name = ? AND BINARY password = ?;", [$name, $password]);
    }

    public function registrationUser($params) {
        $user = new User($this->database);
        $user->addUser($params);
    }

}
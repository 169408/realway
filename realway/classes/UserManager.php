<?php

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
     * @return DatabaseConnection
     */
    public function getDatabase(): DatabaseConnection
    {
        return $this->database;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    public function authorisationUser($params) {
        return $this->database->getQuery("SELECT * FROM users WHERE name = \"{$params["name"]}\" and password = \"{$params["password"]}\";");
    }




}
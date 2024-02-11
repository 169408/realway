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
        /*$strQuery = "SELECT * FROM users WHERE name = \":name\" and password = \":password\";";
        $strQuery = str_replace([":name", ":password"], [transformstr($params["name"]), transformstr($params["password"])], $strQuery);
        return $this->database->getQuery($strQuery);*/
        $name = $params["name"];
        $password = $params["password"];

        $strQuery = "SELECT * FROM users WHERE name = ? AND password = ?";
        $stmt = mysqli_prepare($this->database->getConnect(), $strQuery);

        mysqli_stmt_bind_param($stmt, "ss", $user_insert_name_safe, $user_insert_password_safe);
        $user_insert_name_safe = mysqli_real_escape_string($this->database->getConnect(), $name);
        $user_insert_password_safe = mysqli_real_escape_string($this->database->getConnect(), $password);

        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function registrationUser($params) {
        $user = new User($this->database);
        $user->addUser($params);
    }




}
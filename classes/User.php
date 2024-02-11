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
        /*if($this->id != null){
            return $this->database->getQuery("UPDATE users SET name = \"$this->name\", email = \"$this->email\", password = \"$this->password\", company = \"$this->company\" WHERE id = $this->id;");
        }
        return $this->database->getQuery("INSERT INTO users(name, email, password, company) VALUES (\"{$this->name}\", \"{$this->email}\", \"{$this->password}\", \"{$this->company}\");");*/

        if($this->id != null){
            return $this->database->getQuery("UPDATE users SET name = \"$this->name\", email = \"$this->email\", password = \"$this->password\", company = \"$this->company\" WHERE id = $this->id;");
        }
        $sqlquery = "INSERT INTO users(name, email, password, company) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_prepare($this->database->getConnect(), $sqlquery);

        if(!$stmt) {
            die("Error with prepare statement");
        }

        mysqli_stmt_bind_param($stmt, "ssss", $user_input_name_safe, $user_input_email_safe, $user_input_password_safe, $user_input_company_safe);
        $user_input_name_safe = mysqli_real_escape_string($this->database->getConnect(), $this->name);
        $user_input_email_safe = mysqli_real_escape_string($this->database->getConnect(), $this->email);
        $user_input_password_safe = mysqli_real_escape_string($this->database->getConnect(), $this->password);
        $user_input_company_safe = mysqli_real_escape_string($this->database->getConnect(), $this->company);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return;



        //$new_user_id = mysqli_insert_id($this->database->getConnect());

/*        // Обробка результатів (наприклад, виведення на екран)
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['username'] . "\n";
        }

// Закриття підготовленого запиту
        mysqli_stmt_close($stmt);

// Закриття з'єднання з базою даних
        mysqli_close($this->database->getConnect());*/
        //var_dump($new_user_id);
        /*print_arr($result);
        var_dump($result);*/

        //die();
        //return $this->database->getQuery("INSERT INTO users(name, email, password, company) VALUES (\"{$this->name}\", \"{$this->email}\", \"{$this->password}\", \"{$this->company}\");");
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
        return $this->database->getQuery("DELETE FROM users WHERE id = {$params["id"]};");
    }

    public function getUser($params) {
        return $this->database->getQuery("SELECT * FROM users WHERE id = {$params["id"]};");
    }


}
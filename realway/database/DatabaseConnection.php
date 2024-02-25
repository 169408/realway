<?php

class DatabaseConnection
{
    public static $instance = null;
    private $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect("127.0.0.1", "root", "ioskillMy_bra1n", "realway");

        if(!$this->connect) {
            die("Connection error");
        }
    }

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnect(): bool|mysqli
    {
        return $this->connect;
    }

    public function getQuery($queryStr) {
/*        var_dump($queryStr);
        echo "<br />";*/
        return mysqli_query($this->connect, $queryStr);
    }

    public function disconnect() {
        return mysqli_query($this->connect, "exit;");
    }

    public function fulfilQuery($sqlquery, $parameters) {
        $stmt = mysqli_prepare($this->connect, $sqlquery);
        if(!$stmt) {
            die("Error with prepare statement");
        }
        $types = "";
        foreach ($parameters as $parameter) {
            if(is_int($parameter)) {
                $types .= "i";
            }
            if(is_string($parameter)) {
                $types .= "s";
            }
            if(is_float($parameter) || is_double($parameter)) {
                $types .= "d";
            }
        }

        $stmt->bind_param($types, ...$parameters);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        mysqli_stmt_close($stmt);

        return $result;
    }

}
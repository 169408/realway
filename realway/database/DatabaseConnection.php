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
        var_dump($queryStr);
        echo "<br />";
        return mysqli_query($this->connect, $queryStr);
    }

    public function disconnect() {
        return mysqli_query($this->connect, "exit;");
    }




}
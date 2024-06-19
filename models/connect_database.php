<?php

class ConnectDatabase
{
    private $serverName;
    private $username;
    private $password;
    private $dbName;

    public $conn;

    public function __construct($serverName = 'localhost', $username = 'root', $password = 'password', $dbName = 'demo_php_01')
    {
        $this->serverName = $serverName;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;

        $this->getConnection();
    }

    private function setConnection()
    {
        $serverName = $this->serverName;
        $username = $this->username;
        $password = $this->password;
        $dbName = $this->dbName;

        try {
            $dns = 'mysql:host='. $serverName .';dbname=' . $dbName;
            $conn = new PDO ($dns, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            $this->conn = $conn;
        } catch (Exception $exception) {
            var_dump($exception->getMessage());
        }
    }

    public function getConnection()
    {
        // set connection
        $this->setConnection();

        return $this->conn;
    }


}
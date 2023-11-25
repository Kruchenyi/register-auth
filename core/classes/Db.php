<?php

namespace myfrm;

use PDO;
use PDOException;
use PDOStatement;

class Db
{

    private $connection;
    private PDOStatement $stmt;
    private static $instance = NULL;
    private function __construct()
    {
    }
    private function __clone()
    {
    }
    public function __wakeup()
    {
    }
    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=register-practic";
            $this->connection = new PDO($dsn, 'root', 'root', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } catch (PDOException $e) {
            echo "Error Db : $e";
        }
        return $this;
    }
    public function query($query, $params = [])
    {
        try {
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);
        } catch (PDOException $e) {
        }

        return $this;
    }

    public function find()
    {
        return $this->stmt->fetch();
    }
    public function findAll()
    {
        return $this->stmt->fetchAll();
    }
    public function fetchCol()
    {
        return $this->stmt->fetchColumn();
    }
}

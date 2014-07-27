<?php

namespace Database;

class MySQL {
    /**
     * @var \PDO $pdo
     */
    private $pdo;

    public function __construct($dbname, $host, $username, $password) {
        $uri = 'mysql:dbname='.$dbname.';host='.$host;

        try {
            $this->pdo = new \PDO($uri, $username, $password);
        } catch(\PDOException $e) {
            throw new \Exception('Database connection failed!');
        }
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }

    public function lastInsertID($name=null) {
        return $this->pdo->lastInsertId($name);
    }
}
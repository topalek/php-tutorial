<?php

namespace Core;

use PDO;

class Db
{
    private $connection;
    private $stmt;

    public function __construct($config, $user = 'root', $password = '',)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $user, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public static function getInstance(): PDO
    {
        //
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function find(): mixed
    {
        return $this->stmt->fetch();
    }


    public function findOrFail(): mixed
    {
        $data = $this->find();
        if (!$data) {
            abort();
        }
        return $data;
    }

    public function get(): mixed
    {
        return $this->stmt->fetchAll();
    }

    public function getOrFail(): mixed
    {
        $data = $this->stmt->fetchAll();
        if (!$data) {
            abort();
        }
        return $data;
    }
}
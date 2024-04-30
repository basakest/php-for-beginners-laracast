<?php

class Database
{
    public PDO|null $connection = null;

    public function __construct()
    {
        $dsn = 'mysql:dbname=myapp;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $this->connection = new PDO($dsn, $user, $password);
    }

    public function query(string $query): false|PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}

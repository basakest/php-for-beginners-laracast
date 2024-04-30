<?php

class Database
{
    public PDO|null $connection = null;

    public function __construct(array $config, $user = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query): false|PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}

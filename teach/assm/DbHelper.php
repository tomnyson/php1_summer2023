<?php

class DbHelper
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function fetchAll($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->rowCount();
    }
}

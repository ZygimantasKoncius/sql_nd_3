<?php

namespace DBWrapper;

class DBWrapper
{
    private $connection;
    public function __construct($host = 'localhost', $databaseName = 'sql_nd_3', $username = 'root', $password = 'password'){
        $this->connection = new \PDO('mysql:='.$host.';dbname='.$databaseName, $username, $password);
    }
    public function getConnection()
    {
        return $this->connection;
    }
}
<?php

namespace app\core;

class Database
{
    public \PDO $pdo;
    public function __construct(array $config)
    {
        $dsn=$config['dsn'] ?? '';
        $user=$config['user'] ?? '';
        $pass=$config['pass'] ?? '';
        $this->pdo=new \PDO($dsn,$user,$pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }
}
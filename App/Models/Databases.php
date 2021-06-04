<?php
namespace Models;

class Databases
{
    protected string $dsn;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demo";
        $this->username = "root";
        $this->password = "200997";
    }

    public function connect(): \PDO
    {
        return new \PDO($this->dsn,$this->username,$this->password);
    }
}
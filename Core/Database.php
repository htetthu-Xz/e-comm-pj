<?php

namespace Core;

use Core\Router;

class Database 
{
    public $connection;
    public $statement;
    

    public function __construct($config, $username = 'domak', $password ='audrey')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new \PDO($dsn, $username, $password, [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
        // $database_connection = "mysql:host=localhost;port=3306;dbname=userform;user=root;password=123htet2023";
        // $this->connection = new PDO($database_connection);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this; 
    }

    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();
         
        if(! $result){
            $router = new Router;
            $router->abort();
        }

        return $result;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    // public function fineByEmailAndPassword($email, $password) 
    // {

    // }
}
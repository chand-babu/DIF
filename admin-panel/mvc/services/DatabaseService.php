<?php

namespace services;


class DatabaseService
{
    public $connection = null;
    function __construct()
    {
        $options = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        $dsn = "mysql:dbname=" . DATABASE . ";host=" . HOST;
        $this->connection = new \PDO($dsn, USER, PASSWORD, $options);
    }
}
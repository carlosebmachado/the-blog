<?php

class DB
{
    private $pdo;

    public static function getPDO()
    {
        if (!isset($pdo))
        {
            $pdo = new PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
        }
        return $pdo;
    }
}

<?php

namespace models;

use Exception;

class DAO
{
    static $pdo;

    public static function get_pdo()
    {
        if (!isset($pdo))
        {
            $pdo = new \PDO('mysql:host='.\Config::DB_HOST.';dbname='.\Config::DB_NAME, \Config::DB_USER, \Config::DB_PASSWORD);
        }
        return $pdo;
    }

    public static function select($sql, $params = null)
    {
        try
        {
            $pdo = self::get_pdo();
            $query = $pdo->prepare($sql);
            if ($params != null) $query->execute($params);
            else $query->execute();
        }
        catch (Exception $e)
        {
            return null;
        }
        return $query;
    }

    public static function insert($sql, $params = null)
    {
        return self::bool_op($sql, $params);
    }

    public static function update($sql, $params = null)
    {
        return self::bool_op($sql, $params);
    }

    public static function delete($sql, $params = null)
    {
        return self::bool_op($sql, $params);
    }

    private static function bool_op($sql, $params = null)
    {
        try
        {
            $pdo = self::get_pdo();
            $query = $pdo->prepare($sql);
            if ($params != null) $query->execute($params);
            else $query->execute();
        }
        catch (Exception $e)
        {
            return false;
        }
        return true;
    }
}

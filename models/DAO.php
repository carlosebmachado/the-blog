<?php

namespace models;

use Exception;

class DAO
{
    public static function select($sql)
    {
        try
        {
            $pdo = \DB::getPDO();
            $query = $pdo->prepare($sql);
            $query->execute();
        }
        catch (Exception)
        {
            
        }
        return $query->fetchAll();
    }

    public static function insert($sql)
    {
        return self::boolSql($sql);
    }

    public static function update($sql)
    {
        return self::boolSql($sql);
    }

    public static function delete($sql)
    {
        return self::boolSql($sql);
    }

    private static function boolSql($sql)
    {
        try
        {
            $pdo = \DB::getPDO();
            $query = $pdo->prepare($sql);
            $query->execute();
        }
        catch (Exception)
        {
            return false;
        }
        return true;
    }
}

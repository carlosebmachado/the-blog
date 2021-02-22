<?php

namespace models;

class HomeModel extends Model
{
    public static function selectAll()
    {
        $pdo = \DB::getPDO();
        $sql = "SELECT * FROM `article`";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}

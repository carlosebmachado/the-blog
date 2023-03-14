<?php

namespace models;

use Exception;

class DAO
{
  static $pdo;

  public static function get_pdo()
  {
    if (!isset($pdo)) {
      $pdo = new \PDO('mysql:host=' . \Config::DB_HOST . ';dbname=' . \Config::DB_NAME, \Config::DB_USER, \Config::DB_PASSWORD);
    }
    return $pdo;
  }

  /**
   * General SQL commands.
   * 
   * @param string $columns SQL command.
   * @param array  $params  All user input parameters to prevent SQLi.
   * @return mixed
   */
  public static function general($sql, $params = null)
  {
    return self::select($sql, $params);
  }

  /**
   * Select rows of a specifc table.
   * 
   * @param string $columns SQL command.
   * @param array  $params  All user input parameters to prevent SQLi.
   * @return mixed
   */
  public static function select($sql, $params = null)
  {
    try {
      $pdo = self::get_pdo();
      $query = $pdo->prepare($sql);
      if ($params != null) $query->execute($params);
      else $query->execute();
      $data = $query != null ? $query->fetchAll() : null;
    } catch (Exception $e) {
      if (\Config::SHOW_ERRORS) {
        print('DB error: ' . $e->getMessage());
      }
      return null;
    }
    return $data;
  }

  /**
   * Insert a row in a specifc table.
   * 
   * @param string $columns SQL command.
   * @param array  $params  All user input parameters to prevent SQLi.
   * @return bool
   */
  public static function insert($sql, $params = null)
  {
    return self::bool_op($sql, $params);
  }

  /**
   * Update a row in a specifc table.
   * 
   * @param string $columns SQL command.
   * @param array  $params  All user input parameters to prevent SQLi.
   * @return bool
   */
  public static function update($sql, $params = null)
  {
    return self::bool_op($sql, $params);
  }

  /**
   * Delete a row in a specifc table.
   * 
   * @param string $columns SQL command.
   * @param array  $params  All user input parameters to prevent SQLi.
   * @return bool
   */
  public static function delete($sql, $params = null)
  {
    return self::bool_op($sql, $params);
  }

  private static function bool_op($sql, $params = null)
  {
    try {
      $pdo = self::get_pdo();
      $query = $pdo->prepare($sql);
      if ($params != null) $query->execute($params);
      else $query->execute();
    } catch (Exception $e) {
      if (\Config::SHOW_ERRORS) {
        print('DB error: ' . $e->getMessage());
      }
      return false;
    }
    return true;
  }
}

<?php

namespace models;

class User extends Model
{
  const TABLE_NAME = 'user';

  private $id;
  private $name;
  private $change_pwd;
  private $role;
  private $uid;
  private $pwd;

  function __construct($id, $name, $change_pwd, $role, $uid, $pwd)
  {
    $this->id = $id;
    $this->name = $name;
    $this->change_pwd = $change_pwd;
    $this->role = $role;
    $this->uid = $uid;
    $this->pwd = $pwd;
  }

  public function get_id()
  {
    return $this->id;
  }
  public function get_name()
  {
    return $this->name;
  }
  public function set_name($name)
  {
    $this->name = $name;
  }
  public function get_change_pwd()
  {
    return $this->change_pwd;
  }
  public function set_change_pwd($change_pwd)
  {
    $this->change_pwd = $change_pwd;
  }
  public function get_role()
  {
    return $this->role;
  }
  public function set_role($role)
  {
    $this->role = $role;
  }
  public function get_uid()
  {
    return $this->uid;
  }
  public function set_uid($uid)
  {
    $this->uid = $uid;
  }
  public function get_pwd()
  {
    return $this->pwd;
  }
  public function set_pwd($pwd)
  {
    $this->pwd = $pwd;
  }

  public static function select($uid, $pwd)
  {
    $data = DAO::select("SELECT * FROM `" . User::TABLE_NAME . "` WHERE `uid`=? AND `pwd`=?", array($uid, $pwd));
    if ($data == null) return null;
    $data = $data[0];
    $user = null;
    $user = new User($data['id'], $data['name'], $data['change_pwd'], $data['role'], $data['uid'], $data['pwd']);
    return $user;
  }
}

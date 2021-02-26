<?php

namespace models;

class User extends Model
{
    private $id;
    private $name;
    private $uid;
    private $pwd;
    
    function __construct($id, $name, $uid, $pwd)
    {
        $this->id = $id;
        $this->name = $name;
        $this->uid = $uid;
        $this->pwd = $pwd;
    }
    
    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function set_name($name) { $this->name = $name; }
    public function get_uid() { return $this->uid; }
    public function set_uid($uid) { $this->uid = $uid; }
    public function get_pwd() { return $this->pwd; }
    public function set_pwd($pwd) { $this->pwd = $pwd; }

    public static function select($uid, $pwd)
    {
        $data = DAO::select("SELECT * FROM `user` WHERE `uid`=? AND `pwd`=?", array($uid, $pwd))->fetch();
        $user = null;
        if ($data != null)
            $user = new User($data['id'], $data['name'], $data['uid'], $data['pwd']);
        return $user;
    }
}

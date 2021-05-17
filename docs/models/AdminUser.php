<?php

namespace models;

class AdminUser extends Model
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
        $data = DAO::select("SELECT * FROM `admin_user` WHERE `uid`=? AND `pwd`=?", array($uid, $pwd));
        if ($data == null) return null;
        $data = $data[0];
        $user = null;
        $user = new AdminUser($data['id'], $data['name'], $data['uid'], $data['pwd']);
        return $user;
    }
}

<?php

namespace models;

class About extends Model
{
    const TABLE_NAME = 'about';

    private $id;
    private $name;
    private $about;
    private $photo;
    
    function __construct($id, $name, $about, $photo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->about = $about;
        $this->photo = $photo;
    }
    
    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function set_name($name) { $this->name = $name; }
    public function get_about() { return $this->about; }
    public function set_about($about) { $this->about = $about; }
    public function get_photo() { return $this->photo; }
    public function set_photo($photo) { $this->photo = $photo; }

    public static function select()
    {
        $db_res = DAO::select("SELECT * FROM `".About::TABLE_NAME."` WHERE `id`=1");
        if ($db_res == null) return null;
        $data = $db_res[0];
        $about = new About($data['id'], $data['name'], $data['about'], $data['photo']);
        return $about;
    }

    public static function select_last()
    {
        $db_res = DAO::select("SELECT * FROM `".About::TABLE_NAME."` ORDER BY `id` DESC LIMIT 1");
        if ($db_res == null) return null;
        $data = $db_res[0];
        $about = new About($data['id'], $data['name'], $data['about'], $data['photo']);
        return $about;
    }

    public function insert()
    {
        $sql = "INSERT INTO `".About::TABLE_NAME."` (`id`, `name`, `about`, `photo`) VALUES (".($this->id == null ? 'NULL' : $this->id).", ?, ?, ?)";
        DAO::insert($sql, array($this->name, $this->about, $this->photo));
    }

    public function update($name = null, $about = null, $photo = null)
    {
        if ($name != null) $this->name = $name;
        if ($about != null) $this->about = $about;
        if ($photo != null) $this->photo = $photo;

        $sql = "UPDATE `".About::TABLE_NAME."` SET `name`=?, `about`=?, `photo`=? WHERE `id`=1";
        return DAO::update($sql, array($this->name, $this->about, $this->photo));
    }
}

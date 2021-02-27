<?php

namespace models;

class About extends Model
{
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
        $data = DAO::select("SELECT * FROM `about`")->fetch();
        $about = new About($data['id'], $data['name'], $data['about'], $data['photo']);
        return $about;
    }

    public function update($name = null, $about = null, $photo = null)
    {
        if ($name != null) $this->name = $name;
        if ($about != null) $this->about = $about;
        if ($photo != null) $this->photo = $photo;

        $sql = "UPDATE `about` SET `name` = ?, `about` = ?, `photo` = ? WHERE `id` = ?";
        return DAO::update($sql, array($this->name, $this->about, $this->photo, $this->id));
    }
}

<?php

namespace models;

class ContactMessage extends Model
{
    private $id;
    private $name;
    private $email;
    private $message;

    function __construct($id, $name, $email, $message)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    // Getters and Setters
    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function set_name($name) { $this->name = $name; }
    public function get_email() { return $this->email; }
    public function set_email($email) { $this->email = $email; }
    public function get_message() { return $this->message; }
    public function set_message($message) { $this->message = $message; }

    public static function select_all()
    {
        $data = DAO::select("SELECT * FROM `contact_messages`")->fetchAll();
        $cm = [];
        foreach($data as $q)
        {
            $a = new ContactMessage($q['id'], $q['name'], $q['email'], $q['message']);
            array_push($cm, $a);
        }
        return $cm;
    }

    public function insert()
    {
        $sql = "INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`) VALUES (NULL, ?, ?, ?)";
        DAO::insert($sql, array($this->name, $this->email, $this->message));
    }
}

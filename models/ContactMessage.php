<?php

namespace models;

class ContactMessage extends Model
{
    private $id;
    private $name;
    private $email;
    private $date;
    private $message;

    function __construct($id, $name, $email, $date, $message)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
        $this->message = $message;
    }

    // Getters and Setters
    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function set_name($name) { $this->name = $name; }
    public function get_email() { return $this->email; }
    public function set_email($email) { $this->email = $email; }
    public function get_date() { return $this->date; }
    public function set_date($date) { $this->date = $date; }
    public function get_message() { return $this->message; }
    public function set_message($message) { $this->message = $message; }

    public static function select_by_id($id)
    {
        $data = DAO::select("SELECT * FROM `contact_message` WHERE `id` = ?", array($id));
        if ($data == null) return null;
        $data = $data[0];
        $contact_message = new ContactMessage($data['id'], $data['name'], $data['email'], $data['date'], $data['message']);
        return $contact_message;
    }

    public static function select_on_interval($limit, $offset)
    {
        $data = DAO::select("SELECT * FROM `contact_message` LIMIT ".$offset.", ".$limit);
        if ($data == null) return [];
        $contact_message = [];
        foreach($data as $d)
        {
            $a = new ContactMessage($d['id'], $d['name'], $d['email'], $d['date'], $d['message']);
            array_push($contact_message, $a);
        }
        return $contact_message;
    }

    public static function select_all()
    {
        $data = DAO::select("SELECT * FROM `contact_message`");
        if ($data == null) return [];
        $contact_messages = [];
        foreach($data as $d)
        {
            $a = new ContactMessage($d['id'], $d['name'], $d['email'], $d['date'], $d['message']);
            array_push($contact_messages, $a);
        }
        return $contact_messages;
    }

    public static function delete_by_id($id)
    {
        return DAO::select("DELETE FROM `contact_message` WHERE `id`=?", array($id));
    }

    public function insert()
    {
        $sql = "INSERT INTO `contact_message` (`id`, `name`, `email`, `date`, `message`) VALUES (NULL, ?, ?, ?, ?)";
        DAO::insert($sql, array($this->name, $this->email, $this->date, $this->message));
    }
}

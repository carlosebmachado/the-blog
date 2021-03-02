<?php

namespace models;

class BlogPostCommentary extends Model
{
    private $id;
    private $name;
    private $message;
    private $date;
    private $blog_post_id;
    
    function __construct($id, $name, $message, $date, $blog_post_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->message = $message;
        $this->date = $date;
        $this->blog_post_id = $blog_post_id;
    }
    
    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function set_name($name) { $this->name = $name; }
    public function get_message() { return $this->message; }
    public function set_message($message) { $this->message = $message; }
    public function get_date() { return $this->date; }
    public function set_date($date) { $this->date = $date; }
    public function get_blog_post_id() { return $this->blog_post_id; }

    public static function select_by_id($id)
    {
        $data = DAO::select("SELECT * FROM `blog_post_commentary` WHERE `id` = ?", array($id))->fetch();
        $comment = new BlogPostCommentary($data['id'], $data['name'], $data['message'], $data['date'], $data['blog_post_id']);
        return $comment;
    }

    public static function select_on_interval($limit, $offset)
    {
        $data = DAO::select("SELECT * FROM `blog_post_commentary` LIMIT ".$offset.", ".$limit)->fetchAll();
        $blog_post_commentary = [];

        if ($data != null)
        {
            foreach ($data as $cd)
            {
                $c =  new BlogPostCommentary($cd['id'], $cd['name'], $cd['message'], $cd['date'], $cd['blog_post_id']);
                array_push($blog_post_commentary, $c);
            }
        }

        return $blog_post_commentary;
    }

    public static function select_by_blog_post_id($blog_post_id)
    {
        $data = DAO::select("SELECT * FROM `blog_post_commentary` WHERE `blog_post_id` = ".$blog_post_id)->fetchAll();
        $blog_post_commentary = [];

        if ($data != null)
        {
            foreach ($data as $cd)
            {
                $c =  new BlogPostCommentary($cd['id'], $cd['name'], $cd['message'], $cd['date'], $cd['blog_post_id']);
                array_push($blog_post_commentary, $c);
            }
        }

        return $blog_post_commentary;
    }

    public static function delete_by_id($id)
    {
        return DAO::select("DELETE FROM `blog_post_commentary` WHERE `id` = ?", array($id));
    }

    public function insert()
    {
        if ($this->id == null)
            $sql = "INSERT INTO `blog_post_commentary`(`id`, `name`, `message`, `date`, `blog_post_id`) VALUES (NULL, ?, ?, ?, ?)";
        else
            $sql = "INSERT INTO `blog_post_commentary`(`id`, `name`, `message`, `date`, `blog_post_id`) VALUES (".$this->id.", ?, ?, ?, ?)";

        DAO::insert($sql, array($this->name, $this->message, $this->date, $this->blog_post_id));
    }
}

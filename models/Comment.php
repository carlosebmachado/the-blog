<?php

namespace models;

class Comment extends Model
{
    private $id;
    private $name;
    private $message;
    private $post_date;
    private $article_id;
    
    function __construct($id, $name, $message, $post_date, $article_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->message = $message;
        $this->post_date = $post_date;
        $this->article_id = $article_id;
    }
    
    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function set_name($name) { $this->name = $name; }
    public function get_message() { return $this->message; }
    public function set_message($message) { $this->message = $message; }
    public function get_post_date() { return $this->post_date; }
    public function set_post_date($post_date) { $this->post_date = $post_date; }
    public function get_article_id() { return $this->article_id; }

    public static function select_by_id($id)
    {
        $data = DAO::select("SELECT * FROM `comments` WHERE `id` = ?", array($id))->fetch();
        $comment = new Comment($data['id'], $data['name'], $data['message'], $data['post_date'], $data['article_id']);
        return $comment;
    }

    public static function select_by_article_id($article_id)
    {
        $data = DAO::select("SELECT * FROM `comments` WHERE `article_id` = ".$article_id)->fetchAll();
        $comments = [];

        if ($data != null)
        {
            foreach ($data as $cd)
            {
                $c =  new Comment($cd['id'], $cd['name'], $cd['message'], $cd['post_date'], $cd['article_id']);
                array_push($comments, $c);
            }
        }

        return $comments;
    }

    public static function delete_by_id($id)
    {
        return DAO::select("DELETE FROM `comments` WHERE `id` = ?", array($id));
    }

    public function insert()
    {
        if ($this->id == null)
            $sql = "INSERT INTO `comments`(`id`, `name`, `message`, `post_date`, `article_id`) VALUES (NULL, ?, ?, ?, ?)";
        else
            $sql = "INSERT INTO `comments`(`id`, `name`, `message`, `post_date`, `article_id`) VALUES (".$this->id.", ?, ?, ?, ?)";

        DAO::insert($sql, array($this->name, $this->message, $this->post_date, $this->article_id));
    }
}

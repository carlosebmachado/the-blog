<?php

use models\Model;

class Comment extends Model
{
    private $id;
    private $name;
    private $message;
    private $post_date;
    private $article_id;
    
    function __construct($id, $name, $message, $article_id, $post_date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->message = $message;
        $this->article_id = $article_id;
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
}

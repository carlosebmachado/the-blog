<?php

namespace models;

class Article extends Model
{
    private $id;
    private $title;
    private $post_date;
    private $summary;
    private $body;
    private $call_img;
    private $comments;

    function __construct($id, $title, $post_date, $summary, $body, $call_img, $comments)
    {
        $this->id = $id;
        $this->title = $title;
        $this->post_date = $post_date;
        $this->summary = $summary;
        $this->body = $body;
        $this->call_img = $call_img;
        $this->comments = $comments;
    }

    // Getters and Setters
    public function get_id() { return $this->id; }
    public function get_title() { return $this->title; }
    public function set_title($title) { $this->title = $title; }
    public function get_post_date() { return $this->post_date; }
    public function set_post_date($post_date) { $this->post_date = $post_date; }
    public function get_summary() { return $this->summary; }
    public function set_summary($summary) { $this->summary = $summary; }
    public function get_body() { return $this->body; }
    public function set_body($body) { $this->body = $body; }
    public function get_call_img() { return $this->call_img; }
    public function set_call_img($call_img) { $this->call_img = $call_img; }
    public function get_comments() { return $this->comments; }
    public function set_comments($comments) { $this->comments = $comments; }

    public static function select_by_id($id)
    {
        $data = DAO::select("SELECT * FROM `article` WHERE `id` = ".$id)->fetch();
        $article = null;
        $comments = Comment::select_by_article_id($id);

        if ($data != null)
            $article = new Article($data['id'], $data['title'], $data['post_date'], $data['summary'], $data['body'], $data['call_img'], $comments);

        return $article;
    }

    public static function select_all()
    {
        $data = DAO::select("SELECT * FROM `article`")->fetchAll();
        $articles = [];
        foreach($data as $q)
        {
            $comments = Comment::select_by_article_id($q['id']);
            $a = new Article($q['id'], $q['title'], $q['post_date'], $q['summary'], $q['body'], $q['call_img'], $comments);
            array_push($articles, $a);
        }
        return $articles;
    }

    // public static function select_all_order_by_date_desc()
    // {
    //     $sql = "SELECT * FROM `article` ORDER BY `post_date` DESC";
    // }

    public static function select_on_interval($limit, $offset)
    {
        $data = DAO::select("SELECT * FROM `article` LIMIT ".$offset.", ".$limit."")->fetchAll();
        $articles = [];
        foreach($data as $q)
        {
            $comments = Comment::select_by_article_id($q['id']);
            $a = new Article($q['id'], $q['title'], $q['post_date'], $q['summary'], $q['body'], $q['call_img'], $comments);
            array_push($articles, $a);
        }
        return $articles;
    }

    public function insert()
    {
        if($this->id == null)
            $sql = "INSERT INTO `article` (`id`, `title`, `post_date`, `summary`, `body`, `call_img`) VALUES (NULL, ?, ?, ?, ?, ?)";
        else
            $sql = "INSERT INTO `article` (`id`, `title`, `post_date`, `summary`, `body`, `call_img`) VALUES (".$this->id.", ?, ?, ?, ?, ?)";

        DAO::insert($sql, array($this->title, $this->post_date, $this->summary, $this->body, $this->call_img));
    }
}

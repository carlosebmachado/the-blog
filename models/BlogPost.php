<?php

namespace models;

class BlogPost extends Model
{
    private $id;
    private $title;
    private $date;
    private $summary;
    private $body;
    private $image;
    private $comments;

    function __construct($id, $title, $date, $summary, $body, $image, $comments = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->summary = $summary;
        $this->body = $body;
        $this->image = $image;
        $this->comments = $comments;
    }

    // Getters and Setters
    public function get_id() { return $this->id; }
    public function get_title() { return $this->title; }
    public function set_title($title) { $this->title = $title; }
    public function get_date() { return $this->date; }
    public function set_date($date) { $this->date = $date; }
    public function get_summary() { return $this->summary; }
    public function set_summary($summary) { $this->summary = $summary; }
    public function get_body() { return $this->body; }
    public function set_body($body) { $this->body = $body; }
    public function get_image() { return $this->image; }
    public function set_image($image) { $this->image = $image; }
    public function get_comments() { return $this->comments; }
    public function set_comments($comments) { $this->comments = $comments; }

    public static function select_by_id($id)
    {
        $data = DAO::select("SELECT * FROM `blog_post` WHERE `id` = ".$id)->fetch();
        $blog_post = null;
        $comments = BlogPostCommentary::select_by_blog_post_id($id);

        if ($data != null)
            $blog_post = new BlogPost($data['id'], $data['title'], $data['date'], $data['summary'], $data['body'], $data['image'], $comments);

        return $blog_post;
    }

    public static function select_all()
    {
        $data = DAO::select("SELECT * FROM `blog_post`")->fetchAll();
        $blog_posts = [];
        foreach($data as $q)
        {
            $comments = BlogPostCommentary::select_by_blog_post_id($q['id']);
            $a = new BlogPost($q['id'], $q['title'], $q['date'], $q['summary'], $q['body'], $q['image'], $comments);
            array_push($blog_posts, $a);
        }
        return $blog_posts;
    }

    // public static function select_all_order_by_date_desc()
    // {
    //     $sql = "SELECT * FROM `blog_post` ORDER BY `date` DESC";
    // }

    public static function select_search_on_interval($limit, $offset, $q)
    {
        $dq = explode(' ', $q);
        $pq = '';
        foreach ($dq as $sq)
        {
            $pq .= " `title` LIKE '%".$sq."%' OR ";
        }
        $pq = substr($pq, 0, strlen($pq) - 4);
        //print("SELECT * FROM `blog_post` WHERE ".$pq." LIMIT ".$offset.", ".$limit);
        $data = DAO::select("SELECT * FROM `blog_post` WHERE ".$pq." LIMIT ".$offset.", ".$limit)->fetchAll();
        $blog_posts = [];
        foreach($data as $q)
        {
            $comments = BlogPostCommentary::select_by_blog_post_id($q['id']);
            $a = new BlogPost($q['id'], $q['title'], $q['date'], $q['summary'], $q['body'], $q['image'], $comments);
            array_push($blog_posts, $a);
        }
        return $blog_posts;
    }

    public static function select_on_interval($limit, $offset)
    {
        $data = DAO::select("SELECT * FROM `blog_post` LIMIT ".$offset.", ".$limit."")->fetchAll();
        $blog_posts = [];
        foreach($data as $q)
        {
            $comments = BlogPostCommentary::select_by_blog_post_id($q['id']);
            $a = new BlogPost($q['id'], $q['title'], $q['date'], $q['summary'], $q['body'], $q['image'], $comments);
            array_push($blog_posts, $a);
        }
        return $blog_posts;
    }

    public function insert()
    {
        if($this->id == null)
            $sql = "INSERT INTO `blog_post` (`id`, `title`, `date`, `summary`, `body`, `image`) VALUES (NULL, ?, ?, ?, ?, ?)";
        else
            $sql = "INSERT INTO `blog_post` (`id`, `title`, `date`, `summary`, `body`, `image`) VALUES (".$this->id.", ?, ?, ?, ?, ?)";

        DAO::insert($sql, array($this->title, $this->date, $this->summary, $this->body, $this->image));
    }

    public static function delete_by_id($id)
    {
        return DAO::select("DELETE FROM `blog_post` WHERE `id` = ?", array($id));
    }

    public function update($title = null, $date = null, $summary = null, $body = null, $image = null)
    {
        if ($title != null) $this->title = $title;
        if ($date != null) $this->date = $date;
        if ($summary != null) $this->summary = $summary;
        if ($body != null) $this->body = $body;
        if ($image != null) $this->image = $image;

        $sql = "UPDATE `blog_post` SET `title` = ?, `date` = ?, `summary` = ?, `body` = ?, `image` = ? WHERE `id` = ?";
        return DAO::update($sql, array($this->title, $this->date, $this->summary, $this->body, $this->image, $this->id));
    }
}

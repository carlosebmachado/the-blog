<?php

namespace models;

class Post extends Model
{
    const TABLE_NAME = 'post';

    private $id;
    private $title;
    private $date;
    private $likes;
    private $body;
    private $image;
    private $comments;

    function __construct($id, $title, $date, $likes, $body, $image, $comments = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->likes = $likes;
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
    public function get_summary() { return ""; }
    public function get_body() { return $this->body; }
    public function set_body($body) { $this->body = $body; }
    public function get_image() { return $this->image; }
    public function set_image($image) { $this->image = $image; }
    public function get_comments() { return $this->comments; }
    public function set_comments($comments) { $this->comments = $comments; }

    public static function select_by_id($id)
    {
        $data = DAO::select("SELECT * FROM `".Post::TABLE_NAME."` WHERE `id`=?", array($id));
        if ($data == null) return null;
        $data = $data[0];
        $blog_post = null;
        $comments = BlogPostCommentary::select_by_blog_post_id($id);
        $blog_post = new Post($data['id'], $data['title'], $data['date'], $data['likes'], $data['body'], $data['image'], $comments);

        return $blog_post;
    }

    public static function select_all()
    {
        $data = DAO::select("SELECT * FROM `".Post::TABLE_NAME."`");
        if ($data == null) return [];
        $blog_posts = [];
        foreach($data as $q)
        {
            $comments = BlogPostCommentary::select_by_blog_post_id($q['id']);
            $a = new Post($q['id'], $q['title'], $q['date'], $q['likes'], $q['body'], $q['image'], $comments);
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
        $data = DAO::select("SELECT * FROM `".Post::TABLE_NAME."` WHERE ".$pq." LIMIT ".$offset.", ".$limit);
        if ($data == null) return [];
        $blog_posts = [];
        foreach($data as $q)
        {
            $comments = BlogPostCommentary::select_by_blog_post_id($q['id']);
            $a = new Post($q['id'], $q['title'], $q['date'], $q['likes'], $q['body'], $q['image'], $comments);
            array_push($blog_posts, $a);
        }
        return $blog_posts;
    }

    public static function select_on_interval($limit, $offset)
    {
        $data = DAO::select("SELECT * FROM `post` LIMIT ".$offset.", ".$limit."");
        if ($data == null) return [];
        $blog_posts = [];
        foreach($data as $q)
        {
            $comments = BlogPostCommentary::select_by_blog_post_id($q['id']);
            $a = new Post($q['id'], $q['title'], $q['date'], $q['likes'], $q['body'], $q['image'], $comments);
            array_push($blog_posts, $a);
        }
        return $blog_posts;
    }

    public static function count()
    {
        return DAO::select("SELECT COUNT(*) FROM `".Post::TABLE_NAME."`")[0][0];
    }

    public function insert()
    {
        if($this->id == null)
            $sql = "INSERT INTO `".Post::TABLE_NAME."` (`id`, `title`, `date`, `likes`, `body`, `image`) VALUES (NULL, ?, ?, ?, ?, ?)";
        else
            $sql = "INSERT INTO `".Post::TABLE_NAME."` (`id`, `title`, `date`, `likes`, `body`, `image`) VALUES (".$this->id.", ?, ?, ?, ?, ?)";

        DAO::insert($sql, array($this->title, $this->date, $this->likes, $this->body, $this->image));
    }

    public static function delete_by_id($id)
    {
        return DAO::delete("DELETE FROM `".Post::TABLE_NAME."` WHERE `id`=?", array($id));
    }

    public function update($title = null, $date = null, $likes = null, $body = null, $image = null)
    {
        if ($title != null) $this->title = $title;
        if ($date != null) $this->date = $date;
        if ($likes != null) $this->likes = $likes;
        if ($body != null) $this->body = $body;
        if ($image != null) $this->image = $image;

        $sql = "UPDATE `".Post::TABLE_NAME."` SET `title`=?, `date`=?, `likes`=?, `body`=?, `image`=? WHERE `id`=?";
        return DAO::update($sql, array($this->title, $this->date, $this->likes, $this->body, $this->image, $this->id));
    }
}

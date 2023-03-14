<?php

namespace models;

class Commentary extends Model
{
  const TABLE_NAME = 'commentary';

  private $id;
  private $name;
  private $message;
  private $date;
  private $post_id;

  function __construct($id, $name, $message, $date, $post_id)
  {
    $this->id = $id;
    $this->name = $name;
    $this->message = $message;
    $this->date = $date;
    $this->post_id = $post_id;
  }

  public function get_id()
  {
    return $this->id;
  }
  public function get_name()
  {
    return $this->name;
  }
  public function set_name($name)
  {
    $this->name = $name;
  }
  public function get_message()
  {
    return $this->message;
  }
  public function set_message($message)
  {
    $this->message = $message;
  }
  public function get_date()
  {
    return $this->date;
  }
  public function set_date($date)
  {
    $this->date = $date;
  }
  public function get_post_id()
  {
    return $this->post_id;
  }

  public static function select_by_id($id)
  {
    $data = DAO::select("SELECT * FROM `" . Commentary::TABLE_NAME . "` WHERE `id`=?", array($id));
    if ($data == null) return null;
    $data = $data[0];
    $comment = new Commentary($data['id'], $data['name'], $data['message'], $data['date'], $data['post_id']);
    return $comment;
  }

  public static function select_on_interval($limit, $offset)
  {
    $data = DAO::select("SELECT * FROM `" . Commentary::TABLE_NAME . "` LIMIT " . $offset . ", " . $limit);
    if ($data == null) return [];
    $blog_post_commentary = [];

    foreach ($data as $cd) {
      $c =  new Commentary($cd['id'], $cd['name'], $cd['message'], $cd['date'], $cd['post_id']);
      array_push($blog_post_commentary, $c);
    }

    return $blog_post_commentary;
  }

  public static function select_by_post_id($post_id)
  {
    $data = DAO::select("SELECT * FROM `" . Commentary::TABLE_NAME . "` WHERE `post_id` = ?", array($post_id));
    if ($data == null) return [];
    $blog_post_commentary = [];

    foreach ($data as $cd) {
      $c =  new Commentary($cd['id'], $cd['name'], $cd['message'], $cd['date'], $cd['post_id']);
      array_push($blog_post_commentary, $c);
    }

    return $blog_post_commentary;
  }

  public static function delete_by_id($id)
  {
    return DAO::select("DELETE FROM `" . Commentary::TABLE_NAME . "` WHERE `id` = ?", array($id));
  }

  public static function count()
  {
    return DAO::select("SELECT COUNT(*) FROM `" . Commentary::TABLE_NAME . "`")[0][0];
  }

  public function insert()
  {
    if ($this->id == null)
      $sql = "INSERT INTO `" . Commentary::TABLE_NAME . "`(`id`, `name`, `message`, `date`, `post_id`) VALUES (NULL, ?, ?, ?, ?)";
    else
      $sql = "INSERT INTO `" . Commentary::TABLE_NAME . "`(`id`, `name`, `message`, `date`, `post_id`) VALUES (" . $this->id . ", ?, ?, ?, ?)";

    return DAO::insert($sql, array($this->name, $this->message, $this->date, $this->post_id));
  }
}

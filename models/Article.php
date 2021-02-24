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

        return new Article($data['id'], $data['title'], $data['post_date'], $data['summary'], $data['body'], $data['call_img'], []);
    }

    // public static function selectAll()
    // {
    //     $pdo = \DB::getPDO();
    //     $sql = "SELECT * FROM `article`";
    //     $query = $pdo->prepare($sql);
    //     $query->execute();
    //     return $query->fetchAll();
    // }

    // public static function selectAllOrderByDateDesc()
    // {
    //     $pdo = \DB::getPDO();
    //     $sql = "SELECT * FROM `article` ORDER BY `post_date` DESC";
    //     $query = $pdo->prepare($sql);
    //     $query->execute();
    //     return $query->fetchAll();
    // }

    public static function select_on_interval($limit, $offset)
    {
        $data = DAO::select("SELECT * FROM `article` LIMIT ".$offset.", ".$limit."")->fetchAll();
        $articles = [];
        foreach($data as $q)
        {
            $a = new Article($q['id'], $q['title'], $q['post_date'], $q['summary'], $q['body'], $q['call_img'], []);
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

    private static function test()
    {
        // basic image insertion
        //$image = file_get_contents("./assets/img/test/blog6.jpg");
        //\models\ArticleModel::insert('Title', '2021-02-23', 'This is summary.', 'This is body.', $image);
        // date operation
        //echo date('Y-m-d', time() - DAY_SECONDS * 5);

        $dirname = "./assets/img/test/";
        $image_paths = glob($dirname."*.jpg");
        $images = [];
        
        for($i = 0; $i < count($image_paths); $i++)
        {
            $images[$i] = file_get_contents($image_paths[$i]);
        }
        
        //print_r($image_paths);
        //echo '<br>';
        //print_r($images);
        
        for($i = 150; $i >= 0; $i--)
        {
            $article = new \models\Article(null, 'Lorem ipsum', date('Y-m-d', time() - DAY_SECONDS * $i), 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa. Praesent ultrices, tellus eu facilisis hendrerit, ex neque pulvinar mauris, vitae posuere erat diam imperdiet enim. Vivamus eros mi, euismod facilisis aliquam ut, commodo nec velit. Vivamus congue ullamcorper mi, non aliquam arcu convallis et. Praesent porttitor vitae risus sit amet bibendum. Fusce porta leo ante, vel suscipit lorem tempor et. Donec auctor, velit gravida sodales ultrices, est enim mollis mauris, vitae ultricies ipsum nibh vehicula eros. Donec quis justo ullamcorper, commodo nulla et, interdum ante. Cras eu volutpat ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla feugiat libero in ex accumsan dictum at et ligula.\r\n\r\nInteger eu imperdiet libero. Phasellus porttitor magna in mauris euismod, in placerat sem lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse platea dictumst. In elementum accumsan eros, vitae pharetra turpis porttitor a. Vivamus id nisi nulla. Aenean consectetur nisi quis ex scelerisque, eget ornare nulla lobortis. In tincidunt nisl a lorem congue eleifend.\r\n\r\nSed cursus placerat magna ac dignissim. Pellentesque quis nibh non massa convallis varius non a ligula. Sed sed nisi sed ligula cursus dictum. Aenean vitae massa ipsum. Nam volutpat, diam ut sagittis faucibus, lectus dolor molestie urna, at rhoncus quam ligula ut ex. Maecenas diam justo, auctor ut iaculis aliquam, ultrices vel ante. Quisque euismod libero lectus, eu venenatis quam posuere ac. Proin sodales ante vel pulvinar interdum. Nunc gravida magna non tellus lobortis eleifend. Donec ac fringilla tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam ullamcorper nec turpis sit amet posuere. Nulla facilisi.\r\n\r\nQuisque hendrerit dignissim sem eu dapibus. Nam tempus felis et efficitur consectetur. Aliquam venenatis sapien quis justo accumsan, at pulvinar ligula hendrerit. Duis sodales dui sed est consectetur pharetra. In non sagittis quam. Proin magna tortor, iaculis sed ipsum vitae, vehicula consequat ante. Maecenas et viverra turpis. In bibendum condimentum ipsum, non pulvinar nibh convallis nec. Sed lobortis mollis velit, vitae consectetur magna volutpat quis. Donec placerat arcu eu consequat aliquam. Sed aliquam efficitur turpis, non eleifend dui porta ut. In ex nisl, lobortis sit amet massa et, convallis imperdiet nisi. Phasellus vel luctus leo. Cras mollis, ante at gravida auctor, eros ex commodo lorem, vel volutpat nisl ligula nec tellus. Vivamus in maximus dui. Maecenas et ipsum dui.\r\n\r\nVestibulum in eleifend felis. Quisque consequat arcu eget risus iaculis, non iaculis felis condimentum. Cras consequat venenatis ullamcorper. Sed vel semper felis. Mauris feugiat ipsum at magna sodales gravida. Nullam ipsum sapien, placerat varius leo et, imperdiet fringilla quam. Aliquam tincidunt malesuada felis, eget egestas ligula tempor sit amet. Nullam odio mauris, lobortis in pretium vel, fermentum ac ante. Praesent vel libero nisl. Integer suscipit, diam sed suscipit placerat, massa neque finibus lacus, at hendrerit libero tortor a dolor.', $images[rand(0, 5)], []);
            $article->insert();
        }


    }
}

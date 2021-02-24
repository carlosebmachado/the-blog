<?php

namespace models;

class Article extends Model
{
    private $id;
    private $title;
    private $postDate;
    private $summary;
    private $body;
    private $callImg;

    function __construct($id, $title, $postDate, $summary, $body, $callImg)
    {
        $this->id = $id;
        $this->title = $title;
        $this->postDate = $postDate;
        $this->summary = $summary;
        $this->body = $body;
        $this->callImg = $callImg;
    }

    public static function selectByID($id)
    {
        $pdo = \DB::getPDO();
        $sql = "SELECT * FROM `article` WHERE `id` = ".$id;
        $query = $pdo->prepare($sql);
        $query->execute();
        $data = $query->fetch();
        return new Article($data['id'], $data['title'], $data['post_date'], $data['summary'], $data['body'], $data['call_img']);
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

    public static function selectOnInterval($limit, $offset)
    {
        $pdo = \DB::getPDO();
        $sql = "SELECT * FROM `article` LIMIT ".$offset.", ".$limit."";
        $query = $pdo->prepare($sql);
        $query->execute();
        $articles = [];
        foreach($query->fetchAll() as $q)
        {
            $a = new Article($q['id'], $q['title'], $q['post_date'], $q['summary'], $q['body'], $q['call_img']);
            array_push($articles, $a);
        }
        return $articles;
    }

    public function insert()
    {
        $pdo = \DB::getPDO();
        $sql = "INSERT INTO `article` (`id`, `title`, `post_date`, `summary`, `body`, `call_img`) VALUES (".$this->id.", ?, ?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($this->title, $this->postDate, $this->summary, $this->body, $this->callImg));
    }

    // Getters and Setters
    public function getID() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    public function getPostDate() { return $this->postDate; }
    public function setPostDate($postDate) { $this->postDate = $postDate; }
    public function getSummary() { return $this->summary; }
    public function setSummary($summary) { $this->summary = $summary; }
    public function getBody() { return $this->body; }
    public function setBody($body) { $this->body = $body; }
    public function getCallImg() { return $this->callImg; }
    public function setCallImg($callImg) { $this->callImg = $callImg; }

    private static function test()
    {
        // basic image insertion
        //$image = file_get_contents("./assets/img/test/blog6.jpg");
        //\models\ArticleModel::insert('Title', '2021-02-23', 'This is summary.', 'This is body.', $image);

        $dirname = "./assets/img/test/";
        $imagePaths = glob($dirname."*.jpg");
        $images = [];

        for($i = 0; $i < count($imagePaths); $i++)
        {
            $images[$i] = file_get_contents($imagePaths[$i]);
        }

        //print_r($imagePaths);
        //echo '<br>';
        //print_r($images);

        for($i = 1; $i <= 23; $i++)
        {
            $article = new \models\Article(NULL, 'Lorem ipsum', '2021-02-'.$i, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa. Praesent ultrices, tellus eu facilisis hendrerit, ex neque pulvinar mauris, vitae posuere erat diam imperdiet enim. Vivamus eros mi, euismod facilisis aliquam ut, commodo nec velit. Vivamus congue ullamcorper mi, non aliquam arcu convallis et. Praesent porttitor vitae risus sit amet bibendum. Fusce porta leo ante, vel suscipit lorem tempor et. Donec auctor, velit gravida sodales ultrices, est enim mollis mauris, vitae ultricies ipsum nibh vehicula eros. Donec quis justo ullamcorper, commodo nulla et, interdum ante. Cras eu volutpat ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla feugiat libero in ex accumsan dictum at et ligula.\r\n\r\nInteger eu imperdiet libero. Phasellus porttitor magna in mauris euismod, in placerat sem lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse platea dictumst. In elementum accumsan eros, vitae pharetra turpis porttitor a. Vivamus id nisi nulla. Aenean consectetur nisi quis ex scelerisque, eget ornare nulla lobortis. In tincidunt nisl a lorem congue eleifend.\r\n\r\nSed cursus placerat magna ac dignissim. Pellentesque quis nibh non massa convallis varius non a ligula. Sed sed nisi sed ligula cursus dictum. Aenean vitae massa ipsum. Nam volutpat, diam ut sagittis faucibus, lectus dolor molestie urna, at rhoncus quam ligula ut ex. Maecenas diam justo, auctor ut iaculis aliquam, ultrices vel ante. Quisque euismod libero lectus, eu venenatis quam posuere ac. Proin sodales ante vel pulvinar interdum. Nunc gravida magna non tellus lobortis eleifend. Donec ac fringilla tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam ullamcorper nec turpis sit amet posuere. Nulla facilisi.\r\n\r\nQuisque hendrerit dignissim sem eu dapibus. Nam tempus felis et efficitur consectetur. Aliquam venenatis sapien quis justo accumsan, at pulvinar ligula hendrerit. Duis sodales dui sed est consectetur pharetra. In non sagittis quam. Proin magna tortor, iaculis sed ipsum vitae, vehicula consequat ante. Maecenas et viverra turpis. In bibendum condimentum ipsum, non pulvinar nibh convallis nec. Sed lobortis mollis velit, vitae consectetur magna volutpat quis. Donec placerat arcu eu consequat aliquam. Sed aliquam efficitur turpis, non eleifend dui porta ut. In ex nisl, lobortis sit amet massa et, convallis imperdiet nisi. Phasellus vel luctus leo. Cras mollis, ante at gravida auctor, eros ex commodo lorem, vel volutpat nisl ligula nec tellus. Vivamus in maximus dui. Maecenas et ipsum dui.\r\n\r\nVestibulum in eleifend felis. Quisque consequat arcu eget risus iaculis, non iaculis felis condimentum. Cras consequat venenatis ullamcorper. Sed vel semper felis. Mauris feugiat ipsum at magna sodales gravida. Nullam ipsum sapien, placerat varius leo et, imperdiet fringilla quam. Aliquam tincidunt malesuada felis, eget egestas ligula tempor sit amet. Nullam odio mauris, lobortis in pretium vel, fermentum ac ante. Praesent vel libero nisl. Integer suscipit, diam sed suscipit placerat, massa neque finibus lacus, at hendrerit libero tortor a dolor.', $images[rand(0, 5)]);
            $article->insert();
        }
    }
}

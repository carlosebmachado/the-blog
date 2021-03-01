<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>
    </head>
    <body>
<?php

if (isset($_GET['posts']))
{
    $dirname = "./assets/img/test/";
    $image_paths = glob($dirname."*.jpg");
    $images = [];
    $articles = \models\Article::select_all();
    
    for ($i = 0; $i < count($image_paths); $i++)
    {
        $images[$i] = file_get_contents($image_paths[$i]);
    }

    foreach ($articles as $article)
    {
        $tc = rand(0, 5);
        for ($j = $tc; $j >= 0; $j--)
        {
            $c =  new \models\Comment(null, 'Person Name', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.', date('Y-m-d', strtotime($article->get_post_date()) + rand(0, 5) * (60*60*24)), $article->get_id());
            $c->insert();
        }
    }

    echo '<h2>add_test_data finalized</h2>';
}

// Adding post commentaries
if (isset($_GET['comments']))
{
    $articles = \models\Article::select_all();
    foreach ($articles as $article)
    {
        $tc = rand(0, 5);
        for ($j = $tc; $j >= 0; $j--)
        {
            $c =  new \models\Comment(null, 'Person Name', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.', date('Y-m-d', strtotime($article->get_post_date()) + rand(0, 5)) * DAY_SECONDS, $article->get_id());
            $c->insert();
        }
    }

    echo '<h2>Commentaries added</h2>';
}

// Adding messages
if (isset($_GET['messages']))
{
    for ($i = 50; $i >= 0; $i--)
    {
        $article = new \models\ContactMessage(null, 'Person Name','name@email', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.');
        $article->insert();
    }

    echo '<h2>Messages added</h2>';
}

?>
</body>
</html>

<?php

if (isset($_GET['posts']))
{
    $post_count = (int)$_GET['posts'];
    $image_paths = glob('./data/blog_post_images/*.jpg');
    $images_count = count($image_paths);

    for ($i = $post_count; $i >= 0; $i--)
    {
        $article = new \models\BlogPost(
            null,
            'Lorem ipsum',
            date('Y-m-d', time() - (60*60*24) * $i),
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa. Praesent ultrices, tellus eu facilisis hendrerit, ex neque pulvinar mauris, vitae posuere erat diam imperdiet enim. Vivamus eros mi, euismod facilisis aliquam ut, commodo nec velit. Vivamus congue ullamcorper mi, non aliquam arcu convallis et. Praesent porttitor vitae risus sit amet bibendum. Fusce porta leo ante, vel suscipit lorem tempor et. Donec auctor, velit gravida sodales ultrices, est enim mollis mauris, vitae ultricies ipsum nibh vehicula eros. Donec quis justo ullamcorper, commodo nulla et, interdum ante. Cras eu volutpat ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla feugiat libero in ex accumsan dictum at et ligula.\r\n\r\nInteger eu imperdiet libero. Phasellus porttitor magna in mauris euismod, in placerat sem lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse platea dictumst. In elementum accumsan eros, vitae pharetra turpis porttitor a. Vivamus id nisi nulla. Aenean consectetur nisi quis ex scelerisque, eget ornare nulla lobortis. In tincidunt nisl a lorem congue eleifend.\r\n\r\nSed cursus placerat magna ac dignissim. Pellentesque quis nibh non massa convallis varius non a ligula. Sed sed nisi sed ligula cursus dictum. Aenean vitae massa ipsum. Nam volutpat, diam ut sagittis faucibus, lectus dolor molestie urna, at rhoncus quam ligula ut ex. Maecenas diam justo, auctor ut iaculis aliquam, ultrices vel ante. Quisque euismod libero lectus, eu venenatis quam posuere ac. Proin sodales ante vel pulvinar interdum. Nunc gravida magna non tellus lobortis eleifend. Donec ac fringilla tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam ullamcorper nec turpis sit amet posuere. Nulla facilisi.\r\n\r\nQuisque hendrerit dignissim sem eu dapibus. Nam tempus felis et efficitur consectetur. Aliquam venenatis sapien quis justo accumsan, at pulvinar ligula hendrerit. Duis sodales dui sed est consectetur pharetra. In non sagittis quam. Proin magna tortor, iaculis sed ipsum vitae, vehicula consequat ante. Maecenas et viverra turpis. In bibendum condimentum ipsum, non pulvinar nibh convallis nec. Sed lobortis mollis velit, vitae consectetur magna volutpat quis. Donec placerat arcu eu consequat aliquam. Sed aliquam efficitur turpis, non eleifend dui porta ut. In ex nisl, lobortis sit amet massa et, convallis imperdiet nisi. Phasellus vel luctus leo. Cras mollis, ante at gravida auctor, eros ex commodo lorem, vel volutpat nisl ligula nec tellus. Vivamus in maximus dui. Maecenas et ipsum dui.\r\n\r\nVestibulum in eleifend felis. Quisque consequat arcu eget risus iaculis, non iaculis felis condimentum. Cras consequat venenatis ullamcorper. Sed vel semper felis. Mauris feugiat ipsum at magna sodales gravida. Nullam ipsum sapien, placerat varius leo et, imperdiet fringilla quam. Aliquam tincidunt malesuada felis, eget egestas ligula tempor sit amet. Nullam odio mauris, lobortis in pretium vel, fermentum ac ante. Praesent vel libero nisl. Integer suscipit, diam sed suscipit placerat, massa neque finibus lacus, at hendrerit libero tortor a dolor.',
            substr($image_paths[rand(0, $images_count-1)], 24),
            []
        );
        $article->insert();
    }

    echo '<h2>Posts added</h2>';
}

// Adding post commentaries
if (isset($_GET['comments']))
{
    $articles = \models\BlogPost::select_all();
    foreach ($articles as $article)
    {
        $tc = rand(0, 5);
        for ($j = $tc; $j >= 0; $j--)
        {
            $c =  new \models\BlogPostCommentary(
                null, 'Person Name',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.',
                date('Y-m-d', strtotime($article->get_date()) + (60*60*24) * rand(0, 5)),
                $article->get_id()
            );
            $c->insert();
        }
    }

    echo '<h2>Commentaries added</h2>';
}

// Adding messages
if (isset($_GET['messages']))
{
    $messages_count = (int)$_GET['messages'];
    for ($i = $messages_count; $i >= 0; $i--)
    {
        $article = new \models\ContactMessage(
            null,
            'Person Name',
            'name@email',
            date('Y-m-d', time() + (60*60*24) * rand(0, 5)),
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.'
        );
        $article->insert();
    }

    echo '<h2>Messages added</h2>';
}

// $c =  new \models\BlogPostCommentary(null, 'Person Name', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor ultrices augue, ut eleifend ipsum. Proin convallis augue ut nisl viverra, sit amet malesuada enim convallis. Quisque arcu diam, scelerisque sed molestie et, consequat in massa.', date('Y-m-d', time() + (rand(0, 5) * (60*60*24))), 154);
// if ($c->insert())
// {
//     print('deu caquinha');
// }

?>

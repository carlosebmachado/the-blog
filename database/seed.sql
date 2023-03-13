-- admin_user
INSERT INTO `admin_user` (`id`, `name`, `uid`, `pwd`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');-- pwd = md5('admin')

-- about info
INSERT INTO `about_info` (`id`, `name`, `about`, `photo`) VALUES
(1, 'Name', 'About', 'image.jpg');

-- blog post
INSERT INTO `blog_post` (`id`, `title`, `date`, `summary`, `body`, `image`) VALUES
(1, 'Title', '2019-01-01', 'Summary', 'Body', 'image.jpg'),
(2, 'Title 2', '2019-01-01', 'Summary', 'Body', 'image.jpg'),
(3, 'Title 3', '2019-01-01', 'Summary', 'Body', 'image.jpg');

-- blog post commentary
INSERT INTO `blog_post_commentary` (`id`, `name`, `email`, `commentary`, `blog_post_id`) VALUES
(1, 'Name', 'name@mail', 'This is a commentary', 1),
(1, 'Name', 'name@mail', 'This is a commentary', 3),
(1, 'Name', 'name@mail', 'This is a commentary', 1);

-- contact message
INSERT INTO `contact_message` (`id`, `name`, `email`, `date`, `message`) VALUES
(1, 'Name', 'name@mail', '2019-01-01', 'This is a message');

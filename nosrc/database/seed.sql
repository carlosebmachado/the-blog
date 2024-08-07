-- admin_user
INSERT INTO `tb_user` (`name`, `change_pwd`, `role`, `uid`, `pwd`) VALUES
('Admin', 'admin', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3');-- pwd = md5('admin')

-- about info
INSERT INTO `tb_about` (`name`, `about`, `photo`) VALUES
('Name', 'About', 'base64');

-- blog post
INSERT INTO `tb_post` (`title`, `date`, `likes`, `body`, `image`) VALUES
('Title', '2019-01-01', 0, 'Body', 'base64'),
('Title 2', '2019-01-01', 0, 'Body', 'base64'),
('Title 3', '2019-01-01', 0, 'Body', 'base64');

-- blog post commentary
INSERT INTO `tb_commentary` (`name`, `email`, `message`, `post_id`) VALUES
('Name', 'name@mail', 'This is a commentary', 1),
('Name', 'name@mail', 'This is a commentary', 3),
('Name', 'name@mail', 'This is a commentary', 1);

-- contact message
INSERT INTO `tb_contact_message` (`name`, `email`, `date`, `message`) VALUES
('Name', 'name@mail', '2019-01-01', 'This is a message');

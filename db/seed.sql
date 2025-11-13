USE `blogdb`;

--
-- Creating tables for database `blogdb`
--

-- tb_about table structure
CREATE TABLE tb_about (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  about longtext NOT NULL,
  photo longtext DEFAULT NULL
);

-- tb_user table structure
CREATE TABLE tb_user (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  change_pwd tinyint(1) NOT NULL DEFAULT '0', -- 0 = false, 1 = true
  role varchar(15) NOT NULL, 
  uid varchar(15) NOT NULL,
  pwd varchar(255) NOT NULL
);

-- tb_post table structure
CREATE TABLE tb_post (
  id bigint(20) UNSIGNED NOT NULL,
  title varchar(255) NOT NULL,
  date date NOT NULL,
  likes int(11) NOT NULL DEFAULT '0',
  body longtext NOT NULL,
  image longtext DEFAULT NULL
);

-- tb_commentary table structure
CREATE TABLE tb_commentary (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  message text NOT NULL,
  date date NOT NULL,
  post_id bigint(20) UNSIGNED NOT NULL
);

-- tb_contact_message table structure
CREATE TABLE tb_contact_message (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  date date NOT NULL,
  message text NOT NULL
);


--
-- Creating indexes
--

-- tb_about table indexes
ALTER TABLE tb_about
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- tb_admin_user table indexes
ALTER TABLE tb_user
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- tb_post table indexes
ALTER TABLE tb_post
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- tb_commentary table indexes
ALTER TABLE tb_commentary
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- tb_contact_message table indexes
ALTER TABLE tb_contact_message
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);


--
-- Setting AUTO_INCREMENT
--

-- tb_about table AUTO_INCREMENT
ALTER TABLE tb_about
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- tb_user table AUTO_INCREMENT
ALTER TABLE tb_user
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- tb_post table AUTO_INCREMENT
ALTER TABLE tb_post
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- tb_commentary table AUTO_INCREMENT
ALTER TABLE tb_commentary
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- tb_contact_message table AUTO_INCREMENT
ALTER TABLE tb_contact_message
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


--
-- Creating foreign keys
--

-- tb_commentary table foreign keys
ALTER TABLE tb_commentary
  ADD CONSTRAINT fk_comment_post FOREIGN KEY (post_id) REFERENCES tb_post(id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- --------------------------------------------------------


-- Default user insert
INSERT INTO tb_user (id, name, change_pwd, role, uid, pwd) VALUES
(1, 'Admin', 1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');-- pwd = md5('admin')

--
-- Criando tabelas
--

-- Estrutura da tabela tb_about_info
CREATE TABLE tb_about (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  about longtext NOT NULL,
  photo longtext DEFAULT NULL
);

-- Estrutura da tabela tb_user
CREATE TABLE tb_user (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  change_pwd tinyint(1) NOT NULL DEFAULT '0', -- 0 = false, 1 = true
  role varchar(15) NOT NULL, 
  uid varchar(15) NOT NULL,
  pwd varchar(255) NOT NULL
);

-- Estrutura da tabela post
CREATE TABLE tb_post (
  id bigint(20) UNSIGNED NOT NULL,
  title varchar(30) NOT NULL,
  date date NOT NULL,
  likes int(11) NOT NULL DEFAULT '0',
  body longtext NOT NULL,
  image longtext DEFAULT NULL
);

-- Estrutura da tabela tb_commentary
CREATE TABLE tb_commentary (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  message text NOT NULL,
  date date NOT NULL,
  post_id bigint(20) UNSIGNED NOT NULL
);

-- Estrutura da tabela tb_contact_message
CREATE TABLE tb_contact_message (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  date date NOT NULL,
  message text NOT NULL
);


--
-- Criando primary keys e unique keys
--

-- Índices para tabela tb_about
ALTER TABLE tb_about
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- Índices para tabela tb_admin_user
ALTER TABLE tb_user
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- Índices para tabela tb_post
ALTER TABLE tb_post
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- Índices para tabela tb_commentary
ALTER TABLE tb_commentary
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

-- Índices para tabela tb_contact_message
ALTER TABLE tb_contact_message
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);


--
-- Criando auto increments
--

-- AUTO_INCREMENT de tabela tb_about
ALTER TABLE tb_about
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela tb_user
ALTER TABLE tb_user
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela tb_post
ALTER TABLE tb_post
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela tb_commentary
ALTER TABLE tb_commentary
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela tb_contact_message
ALTER TABLE tb_contact_message
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


--
-- Criando foreign keys
--

-- AUTO_INCREMENT de tabela tb_commentary
ALTER TABLE tb_commentary
  ADD CONSTRAINT fk_comment_post FOREIGN KEY (post_id) REFERENCES tb_post(id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- --------------------------------------------------------


-- Inserindo usuário padrão
INSERT INTO tb_user (id, name, change_pwd, role, uid, pwd) VALUES
(1, 'Admin', 1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');-- pwd = md5('admin')

CREATE TABLE IF NOT EXISTS comment (
    id int(11) NOT NULL,
    pseudo varchar(100) NOT NULL,
    content text NOT NULL,
    date_added date NOT NULL,
    article_id int(11) NOT NULL,
    reported tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE comment
ADD PRIMARY KEY(id),
ADD KEY fk_article_id(article_id);

ALTER TABLE comment
MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE comment
ADD CONSTRAINT fk_article_id FOREIGN KEY(article_id) REFERENCES article(id) ON DELETE CASCADE;


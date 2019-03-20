CREATE TABLE IF NOT EXISTS article (

    id int(11) NOT NULL,
    title varchar(100) NOT NULL,
    content text NOT NULL,
    author varchar(100) NOT NULL,
    date_added date NOT NULL
) ENGINE=innoDB DEFAULT CHARSET=utf8;


ALTER TABLE article
ADD PRIMARY KEY(id);
ALTER TABLE article
MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


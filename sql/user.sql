CREATE TABLE IF NOT EXISTS user (

    id int(11) NOT NULL,
    pseudo varchar(100) NOT NULL,
    mail varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    role varchar(100) NOT NULL
) ENGINE=innoDB DEFAULT CHARSET=utf8;



ALTER TABLE user
ADD PRIMARY KEY(id);

ALTER TABLE user
MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE user
MODIFY pseudo varchar(100) NOT NULL UNIQUE;

INSERT INTO user (pseudo, mail, password, role) VALUES ("forteroche", "JeanForteroche@gmail.com" , '$2y$10$.WeOPt9LS35s28fSAjtG5.o23aUQWzAHkgr66GunLdKMQG8TQugAe', "administrateur");
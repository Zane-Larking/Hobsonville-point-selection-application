CREATE TABLE applications (
    aid int(11) NOT null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) NOT null,
    date datetime NOT null,
    application TEXT not null
);
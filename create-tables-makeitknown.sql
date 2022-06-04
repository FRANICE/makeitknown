CREATE DATABASE IF NOT EXISTS makeitknowndb;

USE makeitknowndb;

CREATE TABLE tUser (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(200) NOT NULL UNIQUE,
  encrypted_password VARCHAR(100) NOT NULL,
  active_session_token CHAR(20)
);

CREATE TABLE tCard (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  picture VARCHAR(500) NOT NULL,
  title VARCHAR(25) NOT NULL,
  `description` VARCHAR(355) NOT NULL,
  publication_date DATE NOT NULL DEFAULT CURDATE(),
  user_id INTEGER NOT NULL,
  
  CONSTRAINT user_card FOREIGN KEY (user_id) REFERENCES tUser(id)
);

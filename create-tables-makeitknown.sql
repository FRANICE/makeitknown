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
  publication_date DATETIME NOT NULL DEFAULT CURDATE(),
  user_id INTEGER NOT NULL,
  
  CONSTRAINT user_card FOREIGN KEY (user_id) REFERENCES tUser(id)
);

INSERT INTO tUser (username, email, encrypted_password, active_session_token) VALUES ('admin', 'admin@gmuil.com', '1234', '');

INSERT INTO tCard (picture, title, description, user_id) VALUES
('https://www.pinpng.com/pngs/m/2-24664_question-mark-clipart-clear-background-interrogation-point-no.png', 'iPhone encontrado', 'Se ha encontrado un iPhone en la cafetería de FNAC de A Coruña sobre las 18.30 del martes, 23 de Abril de 2022. Se ha entregado al responsable del establecimiento.', 1),
('https://www.pinpng.com/pngs/m/2-24664_question-mark-clipart-clear-background-interrogation-point-no.png', 'Llaves perdidas', 'Llaves perdidas en un banco del parque de Sta. Margarita, donde el quiosco. Las tengo yo, contactar por Instagram: @milena89.', 1),
('https://www.pinpng.com/pngs/m/2-24664_question-mark-clipart-clear-background-interrogation-point-no.png', 'Bufanda extraviada', 'Se ha encontrado esta bufanda en el Burger King de Marineda City. Entregada al responsable del establecimiento.', 1),
('https://www.pinpng.com/pngs/m/2-24664_question-mark-clipart-clear-background-interrogation-point-no.png', 'Pulsera encontrada', 'Encontrada en el suelo en el parque de Bens. Tlf: 666 66 66 66.', 1),
('https://www.pinpng.com/pngs/m/2-24664_question-mark-clipart-clear-background-interrogation-point-no.png', 'Pen drive encontrado', 'Apareció este pen en la biblioteca de la FIC de A Coruña. Entregado al responsable de la biblioteca.', 1),
('https://www.pinpng.com/pngs/m/2-24664_question-mark-clipart-clear-background-interrogation-point-no.png', 'Bolsa con cascos', 'Se han encontrado unos cascos beats en la línea 6A de A Coruña el miércoles 4 de mayo de 2022. Han sido entregados al conductor del autobús.', 1);

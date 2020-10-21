CREATE DATABASE Blog;
USE Blog;
CREATE TABLE Usuarios(
    nickname VARCHAR(40) NOT NULL PRIMARY KEY,
    e_mail VARCHAR(255),
    contrasena VARCHAR(255),
    foto_nick VARCHAR(255),
    tipo_de_usuario VARCHAR(255) ,
    estado int 
);

CREATE TABLE Posts(
    id_post INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nickname VARCHAR(40),
    titulo VARCHAR(255),
    contenido VARCHAR(1000),
    imagen_post VARCHAR(255),
    visitas INT,
    fecha DATE,
    FOREIGN KEY (nickname) REFERENCES Usuarios(nickname)
);

CREATE TABLE Comentarios(
    id_comentario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_post INT NOT NULL,
    nickname VARCHAR(40) NOT NULL,
    comentario VARCHAR(400),
    fecha DATE,
    FOREIGN KEY (id_post) REFERENCES Posts(id_post),
    FOREIGN KEY (nickname) REFERENCES Usuarios(nickname)
);


/* Datos de prueba */

INSERT INTO Usuarios VALUES('Jon','jonanderdecastro@gmail.com','1234','enlaceFoto', 'admin', 0);
INSERT INTO Usuarios VALUES('David','davitxu20@gmail.com','1234','enlaceFoto', 'admin', 0);
INSERT INTO Usuarios VALUES('Ordoño','email', '1234','enlaceFoto', 'mod', 0);

INSERT INTO Posts (nickname, titulo, contenido, imagen_post, visitas, fecha) VALUES('Jon','este es el titulo del post 1', 'este es el contenido del post 1 ','imgPost', 0, '2020-10-20');
INSERT INTO Posts (nickname, titulo, contenido, imagen_post, visitas, fecha) VALUES('David','este es el titulo del post 2', 'este es el contenido del post 2 ','imgPost', 0, '2020-10-18');
INSERT INTO Posts (nickname, titulo, contenido, imagen_post, visitas, fecha) VALUES('Ordoño','este es el titulo del post 3', 'este es el contenido del post 3 ','imgPost', 0, '2020-09-20');

INSERT INTO Comentarios (id_post, nickname, comentario, fecha) VALUES(1,'David', 'este es un comentario del post 1', '2020-10-22');
INSERT INTO Comentarios (id_post, nickname, comentario, fecha) VALUES(2,'Ordoño', 'este es un comentario del post 1', '2020-10-23');
INSERT INTO Comentarios (id_post, nickname, comentario, fecha) VALUES(3,'Jon', 'este es un comentario del post 2', '2020-10-22');

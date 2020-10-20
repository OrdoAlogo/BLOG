CREATE DATABASE Blog;
USE Blog;
CREATE TABLE Usuarios(
    nickname VARCHAR(40) NOT NULL PRIMARY KEY,
    e_mail VARCHAR(255),
    foto_nick VARCHAR(255),
    tipo_de_usuario INT,
    estado VARCHAR(255)
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

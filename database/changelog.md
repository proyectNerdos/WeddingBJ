# DEVSM 2024.4.18 Tabla para las fotos de galeria

CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image BLOB,
    image_filename VARCHAR(255)
);


# DEVSM 2024.4.15

Name database: belenyjose

CREATE TABLE Invitados (
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    attendance VARCHAR(255) NOT NULL,
    guests INT NOT NULL,
    message TEXT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

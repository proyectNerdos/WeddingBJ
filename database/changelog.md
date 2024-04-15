# DEVSM 2024.4.15

Name database: belenyjose

CREATE TABLE Invitados (
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    attendance BOOLEAN NOT NULL,
    guests INT NOT NULL,
    message TEXT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

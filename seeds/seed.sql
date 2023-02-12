DROP TABLE IF EXISTS users;

CREATE TABLE users (
id INT AUTO_INCREMENT,
   first_name VARCHAR(100),
   last_name VARCHAR(100),
   role VARCHAR(50),
   email VARCHAR(100),
   password VARCHAR(255),
   uid VARCHAR(100),
   PRIMARY KEY(id)
);

INSERT INTO users
VALUES (1, "Kai", "Reid", "Admin", "kaireid@techbubl.com", "$2y$10$QOoknqYB3FL2jnKhM4VqeOTRjfmtjcbnMWmIfdqbfqPqAea6u7PDi", NULL);

INSERT INTO users
VALUES (2, "Marucs", "Greene", "Editor", "marcusgreene@techbubl.com", NULL, NULL);

INSERT INTO users
VALUES (3, "John", "Roberts", "Editor", "johnroberts@techbubl.com", NULL, NULL);
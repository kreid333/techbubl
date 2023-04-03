CREATE TABLE users (
id INT AUTO_INCREMENT NOT NULL,
first_name VARCHAR(100),
last_name VARCHAR(100),
role VARCHAR(50),
email VARCHAR(100),
password VARCHAR(255),
is_verified TINYINT,
PRIMARY KEY(id)
);

CREATE TABLE verification (
id INT AUTO_INCREMENT NOT NULL,
user_id INT,
verification_code VARCHAR(100),
PRIMARY KEY(id),
FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE categories (
id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(100),
PRIMARY KEY(id)
);

CREATE TABLE posts (
id INT AUTO_INCREMENT NOT NULL,
user_id INT,
category_id INT,
title VARCHAR(100),
body MEDIUMTEXT,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id),
FOREIGN KEY(user_id) REFERENCES users(id),
FOREIGN KEY(category_id) REFERENCES categories(id)
);

CREATE TABLE newsletter (
id INT AUTO_INCREMENT NOT NULL,
email VARCHAR(100),
PRIMARY KEY(id)
);

CREATE TABLE comments(
id INT AUTO_INCREMENT,
post_id INT,
user_id INT,
body TEXT,
publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id),
FOREIGN KEY(user_id) REFERENCES users(id),
FOREIGN KEY(post_id) REFERENCES posts(id)
);

INSERT INTO categories (name) VALUES ("Artificial Intelligence");
INSERT INTO categories (name) VALUES ("Web Development");
INSERT INTO categories (name) VALUES ("Cryptocurrency");

INSERT INTO users
VALUES (1, "Kai", "Reid", "Admin", "kaireid@techbubl.com", "$2y$10$QOoknqYB3FL2jnKhM4VqeOTRjfmtjcbnMWmIfdqbfqPqAea6u7PDi", 1);

INSERT INTO users
VALUES (2, "Marcus", "Greene", "Editor", "marcusgreene@techbubl.com", "$2y$10$QOoknqYB3FL2jnKhM4VqeOTRjfmtjcbnMWmIfdqbfqPqAea6u7PDi", 1);

INSERT INTO users
VALUES (3, "John", "Roberts", "Editor", "johnroberts@techbubl.com", "$2y$10$QOoknqYB3FL2jnKhM4VqeOTRjfmtjcbnMWmIfdqbfqPqAea6u7PDi", 1);

INSERT INTO posts (user_id, category_id, title, body) VALUES (1, 1, "This is a title", "<p>Hello World!</p>");
INSERT INTO posts (user_id, category_id, title, body) VALUES (1, 1, "This is a title", "<p>Hello World!</p>");
INSERT INTO posts (user_id, category_id, title, body) VALUES (1, 1, "This is a title", "<p>Hello World!</p>");
create database myweb;
use myweb;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    created_at TIMESTAMP
);

CREATE TABLE categories(
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(100),
    created_at TIMESTAMP
);

CREATE TABLE products(
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT,
    name VARCHAR(100),
    price DECIMAL(10,2),
    stock INT,
    image VARCHAR(255),
    created_at TIMESTAMP,

    FOREIGN KEY(category_id)
    REFERENCES categories(id)
);

INSERT INTO products
(category_id, name, price, stock, image)
VALUES
(4, 'new jean', 79999.00, 15, 'jean.jpg'),
(5, 'new T shirt', 4999.00, 30, 'T_shirt.jpg');

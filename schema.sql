DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product (
    ProductID int,
    Name varchar(255),
    Description varchar(255),
    Price decimal
);

DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product (
  SKU varchar(8),
  name varchar(255),
  addTime timestamp,
  price decimal,
  type int,
);

CREATE TABLE TypeSize (
  SKU varchar(8),
  size int,
 );
 
CREATE TABLE TypeHWL (
  SKU varchar(8),
  height int,
  width int,
  length int 
);

CREATE TABLE TypeWeigth (
  SKU varchar(8),
  weight int
);

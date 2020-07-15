DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product (
  SKU varchar(8),
  Name varchar(255),
  AddTime timestamp,
  Price decimal,
  Type int,
);

CREATE TABLE TypeSize (
  SKU varchar(8),
  Size int,
 );
 
CREATE TABLE TypeHWL (
  SKU varchar(8),
  Height int,
  Width int,
  Length int 
);

CREATE TABLE TypeWeigth (
  SKU varchar(8),
  Weight int
);

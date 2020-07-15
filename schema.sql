DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product{
  SKU varchar(8),
  itemName varchar(255),
  addTime timestamp,
  price decimal,
  itemType int,
};

CREATE TABLE TypeSize{
  SKU varchar(8),
  itemSize int,
 };
 
CREATE TABLE TypeHWL{
  SKU varchar(8),
  itemHeight int,
  itemWidth int,
  itemLength int 
};

CREATE TABLE TypeWeigth{
  SKU varchar(8),
  itemWeight int
};

DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product as P(
  SKU varchar(8),
  itemName varchar(255),
  addTime timestamp,
  price decimal,
  itemType int,
);

CREATE TABLE TypeSize as TS(
  SKU varchar(8),
  itemSize int,
 );
 
CREATE TABLE TypeHWL as THWL(
  SKU varchar(8),
  itemHeight int,
  itemWidth int,
  itemLength int 
);

CREATE TABLE TypeWeigth as TW(
  SKU varchar(8),
  itemWeight int
);

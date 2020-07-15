DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE product as P {
  SKU varchar(8),
  itemName varchar(255),
  addTime timestamp,
  price decimal,
  itemType int,
};

CREATE TABLE typeSize as TS {
  SKU varchar(8),
  itemSize int,
 };
 
CREATE TABLE typeHWL as THWL{
  SKU varchar(8),
  itemHeight int,
  itemWidth int,
  itemLength int 
};

CREATE TABLE typeWeigth as TW{
  SKU varchar(8),
  itemWeight int
};

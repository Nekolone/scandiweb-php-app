DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE product as P {
  SKU varchar(8),
  name varchar(255),
  addTime timestamp,
  price decimal,
  type int,
};

CREATE TABLE typeSize as TS {
  SKU varchar(8),
  size int,
 };
 
CREATE TABLE typeHWL as THWL{
  SKU varchar(8),
  height int,
  width int,
  length int 
};

CREATE TABLE typeWeigth as TW{
  SKU varchar(8),
  weight int
};

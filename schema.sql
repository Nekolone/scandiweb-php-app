DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product (
  SKU varchar(8),
  name varchar(255),
  addTime timestamp,
  price decimal,
  image__link text,
  item__type int
);

CREATE TABLE TypeSize (
  SKU varchar(8),
  size int
);
 
CREATE TABLE TypeHWL (
  SKU varchar(8),
  height int,
  width int,
  length int 
);

CREATE TABLE TypeWeight (
  SKU varchar(8),
  weight int
);

START TRANSACTION;
INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `image__link`, `item__type`) VALUES
('123Car', 'Chevrolet', '2020-07-24 17:06:38', '5999', 'https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg', 2),
('WR1', 'Basic wrench', '2020-07-24 21:11:42', '33', 'https://shop.harborfreight.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/6/7/67150_W3.jpg', 2);
INSERT INTO `TypeWeight` (`SKU`, `weight`) VALUES
('123Car', 1400),
('WR1', 3);
COMMIT;

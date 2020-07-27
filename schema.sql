DROP DATABASE IF EXISTS shopdb;
CREATE DATABASE shopdb;
USE shopdb;

CREATE TABLE Product (
  SKU varchar(8),
  name varchar(255),
  addTime timestamp,
  price decimal,
  image__link varchar(255),
  item__type int,
  PRIMARY KEY(SKU)
);

CREATE TABLE TypeSize (
  SKU varchar(8),
  size varchar(255),
  FOREIGN KEY(SKU) REFERENCES Product(SKU)
);
 
CREATE TABLE TypeHWL (
  SKU varchar(8),
  height int,
  width int,
  length int,
  FOREIGN KEY(SKU) REFERENCES Product(SKU)
);

CREATE TABLE TypeWeight (
  SKU varchar(8),
  weight int,
  FOREIGN KEY(SKU) REFERENCES Product(SKU)
);

START TRANSACTION;
INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `image__link`, `item__type`) VALUES
('721DCCDA', 'Chevrolet', '2020-07-24 17:06:38', '5999', 'https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg', 2),
('90F61397', 'Basic wrench', '2020-07-24 21:11:42', '33', 'https://shop.harborfreight.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/6/7/67150_W3.jpg', 2);
INSERT INTO `TypeWeight` (`SKU`, `weight`) VALUES
('721DCCDA', 1400),
('90F61397', 3);
COMMIT;

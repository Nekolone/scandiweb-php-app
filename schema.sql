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
  height float,
  width float,
  length float,
  FOREIGN KEY(SKU) REFERENCES Product(SKU)
);

CREATE TABLE TypeWeight (
  SKU varchar(8),
  weight float,
  FOREIGN KEY(SKU) REFERENCES Product(SKU)
);

START TRANSACTION;
INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `image__link`, `item__type`) VALUES
('90F61397', 'Basic wrench', '2020-07-24 21:11:42', '33', 'https://shop.harborfreight.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/6/7/67150_W3.jpg', 2),
('CEB55D25','Iphone 6','2020-07-24 22:08:30','800','https://swipe.ua/content/images/14/aktivirovannyy-apple-iphone-6s-16gb-space-gray-mkqj2-26987905924113.png',1),
('29F65039', 'Compact Disc', '2020-07-24 22:08:30','1','https://upload.wikimedia.org/wikipedia/commons/d/d5/CD_autolev_crop.jpg',0),
('8D92CB68','Western Digital Red','2020-07-24 18:04:27','50','https://cdn.shopify.com/s/files/1/0036/4806/1509/products/m005343612_4f0346fe-32ab-4618-946c-3f43813e07db_1000x1000@2x.jpg?v=1583695548',0),
('3008211C','Cupboard','2020-07-24 20:06:45','250','https://images.ua.prom.st/2165721986_shkaf-4d-iris.jpg',1),
('721DCCDA', 'Chevrolet', '2020-07-24 17:06:38', '5999', 'https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg', 2),
('181717D2','SSD disc MAXTOR Z1','2020-07-24 17:03:48','40','https://www.onlinetrade.ru/img/items/m/ssd_disk_maxtor_z1_seagate_2.5_240gb_sata_iii_tlc_ya240vc1a001__1163800_1.jpg',0),
('B3CE414A','Xiaomi Mi Power Bank 2S','2020-07-24 19:05:16','20','https://belker.com.ua/content/images/28/vneshniy-akkumulyator-xiaomi-mi-power-bank-2s-10000-16663491367734_small11.jpg',0),
('FF803B88','headphones','2020-07-24 22:02:59','99','https://specials-images.forbesimg.com/imageserve/5e8ce586748506000636107e/960x0.jpg?fit=scale',2),
('0E74E6AC','Lamp','2020-07-24 22:09:34','29','https://img.zcdn.com.au/lf/50/hash/28819/18650173/4/Henk%2BDesk%2BLamp%2BWith%2BUSB.jpg',2),
('E4D472F9','Chair','2020-07-24 21:07:54','50','https://pinskdrev.lv/web/files/imagick_cache/w1000h0t1/web/catalogfiles/catalog/offers/amati_p328_2_tk_739(1).jpg',1),
('8735516C','Kettlebell','2020-07-24 21:07:54','50','https://pro-equip.pro/images/product/big/660.jpg',2);
INSERT INTO `TypeSize` (`SKU`, `size`) VALUES
('29F65039', '16 gb'),
('181717D2', '240 gb'),
('8D92CB68', '1 tb'),
('B3CE414A', '10000 mah');
INSERT INTO `TypeHWL` (`SKU`, `height`,`width`,`length`) VALUES
('CEB55D25',138.1,67,6.9),
('3008211C',2500,3000,500),
('E4D472F9',880,435,520);
INSERT INTO `TypeWeight` (`SKU`, `weight`) VALUES
('721DCCDA', 1400),
('90F61397', 3),
('8735516C', 24),
('0E74E6AC', 1.5),
('FF803B88', 0.2);
COMMIT;

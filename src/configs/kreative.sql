CREATE TABLE `jewels` (
  `jewelid` INT AUTO_INCREMENT,
  `name` VARCHAR(32),
  `clarity` ENUM('Flawless', 'ws1', 'ws2','vs1','ws2','si1','si2','si3'),
  PRIMARY KEY (`jewelid`)
);


ALTER TABLE `jewels` (
  add column  `clarity` ENUM('Flawless', 'ws1', 'large')

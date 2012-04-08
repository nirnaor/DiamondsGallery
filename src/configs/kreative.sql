CREATE TABLE jewels (
  jewelid INT AUTO_INCREMENT,
  name VARCHAR(32),
  description VARCHAR(150),
  metalcolor ENUM('Gold', 'Silver', 'Platinum'),
  metalweight INT,
  weight INT,
  category ENUM('rings', 'necklaces','bracelets','earings'),
  clarity ENUM('Flawless', 'ws1', 'ws2','vs1','ws2','si1','si2','si3'),
  cut ENUM('round', 'oval', 'peer','heart','asher','emrald','maequise','radiant'),
  UNIQUE(name),
  PRIMARY KEY (jewelid)
);


ALTER TABLE 'jewels' (
  add column  'clarity' ENUM('Flawless', 'ws1', 'large')

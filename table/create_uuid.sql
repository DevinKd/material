CREATE TABLE `uuid` (
  `iduuid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `name` varchar(256) NOT NULL,
  `class` varchar(45) NOT NULL DEFAULT 'all',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `where` varchar(200) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`iduuid`,`uuid`,`name`),
  UNIQUE KEY `idsop_item_UNIQUE` (`iduuid`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='uuid';
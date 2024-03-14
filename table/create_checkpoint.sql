CREATE TABLE `checkpoint` (
  `idcheckpoint` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item` varchar(45) NOT NULL COMMENT 'what checkpoint',
  `info` varchar(100) DEFAULT NULL COMMENT 'checkpoint info',
  `type` varchar(45) NOT NULL DEFAULT 'none' COMMENT 'checkpoint type',
  `scopes` varchar(45) NOT NULL DEFAULT 'none' COMMENT 'what platform',
  `owner` varchar(45) NOT NULL DEFAULT 'none' COMMENT 'who owner',
  `status` varchar(45) DEFAULT NULL,
  `remark` text,
  `author` varchar(45) NOT NULL DEFAULT 'hunter',
  `priority` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcheckpoint`,`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='checkpoint';
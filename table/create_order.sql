CREATE TABLE `order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL COMMENT 'order uuid',
  `product` varchar(45) NOT NULL COMMENT 'product uuid',
  `amount` double NOT NULL,
  `delivery` datetime NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer` varchar(45) NOT NULL COMMENT 'customer uuid',
  `who` varchar(45) NOT NULL COMMENT 'owner uuid,work number\n',
  `remark` text,
  `status` text COMMENT 'last status',
  `priority` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`uuid`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='order';
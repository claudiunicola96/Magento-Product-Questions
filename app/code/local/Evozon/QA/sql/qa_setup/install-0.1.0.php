<?php
/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:03
 */
$installer = $this;
try {
    $installer->startSetup();
    $installer->run("
CREATE TABLE `{$installer->getTable('evozon_qa/qa')}` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `question` text,
  `answer` text,
  `status` varchar(10) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`product_id`),
  UNIQUE KEY `product_id` (`product_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    $installer->endSetup();
} catch (Exception $e) {
    Mage::log($e->getMessage());
}
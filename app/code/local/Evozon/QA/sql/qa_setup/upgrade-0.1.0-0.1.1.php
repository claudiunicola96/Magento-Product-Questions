<?php
/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:04
 */
$installer = $this;
try {
    $installer->startSetup();
    $installer->getConnection()
        ->addKey(
            $installer->getTable('evozon_qa/qa'),
            'IDX_PRODUCT',
            'product_id'
        );
    $installer->getConnection()
        ->addConstraint(
            'FK_EVOZON_QA_CATALOG_PRODUCT',
            $installer->getTable('evozon_qa/qa'),
            'product_id',
            $installer->getTable('catalog/product'),
            'entity_id'
        );
    $installer->getConnection()
        ->addKey(
            $installer->getTable('evozon_qa/qa'),
            'IDX_CUSTOMER',
            'user_id'
        );
    $installer->getConnection()
        ->addConstraint(
            'FK_EVOZON_QA_CUSTOMER',
            $installer->getTable('evozon_qa/qa'),
            'product_id',
            $installer->getTable('catalog/product'),
            'entity_id'
        );
    $installer->endSetup();
} catch (Exception $e) {
    Mage::log($e->getMessage());
}

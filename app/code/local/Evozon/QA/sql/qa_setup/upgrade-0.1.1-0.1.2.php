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
            'IDX_USER',
            'user_id'
        );
    $installer->getConnection()
        ->addConstraint(
            'FK_EVOZON_QA_CUSTOMER_ENTITY',
            $installer->getTable('evozon_qa/qa'),
            'user_id',
            $installer->getTable('customer/entity'),
            'entity_id'
        );
    $installer->endSetup();
} catch (Exception $e) {
    Mage::log($e->getMessage());
}
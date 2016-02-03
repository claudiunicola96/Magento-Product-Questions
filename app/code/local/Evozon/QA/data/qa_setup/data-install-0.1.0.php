<?php
/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:01
 */
$qa = [
    'product_id' => '406',
    'user_id' => '24',
    'question' => 'Bla, bla, bla?',
    'answer' => 'Yes, bla, bla, bla.',
    'status' => 'pending',
    'enable' => '0',
    'create_at' => date("Y-m-d H:i:s", Mage::getModel('core/date')->timestamp(time()))
];
Mage::getModel('evozon_qa/qa')->setData($qa)->save();
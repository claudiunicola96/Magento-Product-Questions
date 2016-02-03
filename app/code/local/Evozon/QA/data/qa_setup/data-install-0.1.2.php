<?php
/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:02
 */
$qa = [
    'product_id' => '456',
    'user_id' => '25',
    'question' => 'Q?',
    'answer' => 'A.',
    'status' => 'approved',
    'enable' => '1',
    'create_at' => date("Y-m-d H:i:s", Mage::getModel('core/date')->timestamp(time())),
];
Mage::getModel('evozon_qa/qa')->setData($qa)->save();
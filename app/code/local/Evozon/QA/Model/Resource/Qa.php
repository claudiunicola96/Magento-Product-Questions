<?php
/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:00
 */
class Evozon_QA_Model_Resource_Qa extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('evozon_qa/qa', 'id');
    }
}
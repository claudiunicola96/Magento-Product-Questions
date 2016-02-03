<?php
/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 18:55
 */

/**
 *
 *
 * @category Evozon
 * @package Evozon_Qa
 * @subpackage Block
 * @author claudiunicola96@gmail.com
 */
class Evozon_QA_Block_Product_Qa extends Mage_Core_Block_Template
{
    /**
     * @var array
     */
    private $qaData = [];

    protected function _construct()
    {
        parent::_construct();
        $this->qaData = $this->getQaCollection();
    }

    /**
     * Getter for qaData
     * @return array
     */
    public function getQaData()
    {
        return $this->qaData;
    }

    /**
     * Get the collection from resource
     * @return array
     */
    public function getQaCollection()
    {
        $collection = Mage::getModel('evozon_qa/qa')->getCollection()
            ->getProductQA(Mage::registry('current_product')->getId());

        return $collection->getData();
    }

}
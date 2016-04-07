<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 18:56
 */
class Evozon_QA_Model_Resource_Qa_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    const QA_STATUS_APPROVED = 'approved';
    const QA_STATUS_PENDING = 'pending';

    protected function _construct()
    {
        $this->_init('evozon_qa/qa');;
    }

    /**
     * Select the fileds from table
     * @return Mage_Core_Model_Resource_Db_Collection_Abstract
     */
    public function prepareFieldToSelect()
    {
        return $this
            ->addFieldToSelect('id')
            ->addFieldToSelect('question')
            ->addFieldToSelect('answer')
            ->addFieldToSelect('create_at');
    }

    /**
     * Select just the approved questions sorted by update_at filed DESC
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getApprovedQuestionsSorted()
    {
        $collection = $this
            ->addFieldToFilter('enable', 1)
            ->addFieldToFilter('status', static::QA_STATUS_APPROVED)
            ->setOrder('update_at', 'DESC');

        return $collection;
    }

    /**
     * Add product filter
     * @param int $productId
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getProductQA($productId)
    {
        $collection = $this->prepareFieldToSelect()->getApprovedQuestionsSorted()
            ->addFieldToFilter('product_id', $productId);

        return $collection;
    }

    /**
     * Do a inner join with catalog_product_entity table to get the sku by product_id
     * @return Mage_Core_Model_Resource_Db_Collection_Abstract
     */
    protected function addSku()
    {
        $this->join('catalog/product',
            'product_id=`catalog/product`.entity_id',
            ['sku' => 'sku']);

        return $this;
    }

    /**
     * Do a inner join with customer_entity_varchar table to get the customer full name by customer_id
     * @return $this
     */
    protected function addCustomerName()
    {
        $first = Mage::getModel('eav/entity_attribute')->loadByCode('1', 'firstname');
        $last = Mage::getModel('eav/entity_attribute')->loadByCode('1', 'lastname');
        $this->getSelect()->join(['ce1' => 'customer_entity_varchar'], 'ce1.entity_id=main_table.customer_id', ['firstname' => 'value'])
            ->where('ce1.attribute_id='.$first->getAttributeId())
            ->join(['ce2' => 'customer_entity_varchar'], 'ce2.entity_id=main_table.customer_id', ['lastname' => 'value'])
            ->where('ce2.attribute_id='.$last->getAttributeId())
            ->columns(new Zend_Db_Expr("CONCAT(`ce1`.`value`, ' ',`ce2`.`value`) AS customer_name"));
        return $this;
    }

    /**
     * Do a inner join with catalog_product_entity_varchar table to get the product_name
     * @return $this
     */
    protected function addProductData()
    {


        $productAttributes = ['name'];
        foreach ($productAttributes as $attributeCode) {
            $alias = $attributeCode . '_table';
            $attribute = Mage::getSingleton('eav/config')
                ->getAttribute(Mage_Catalog_Model_Product::ENTITY, $attributeCode);

            $this->getSelect()->join(
                [$alias => $attribute->getBackendTable()],
                "main_table.product_id = $alias.entity_id AND $alias.attribute_id={$attribute->getId()}",
                [$attributeCode => 'value']
            );
        }

        return $this;
    }

    public function getPreparedCollection(){
        $this->addSku();
        $this->addCustomerName();
        $this->addProductData();
        return $this;
    }
}
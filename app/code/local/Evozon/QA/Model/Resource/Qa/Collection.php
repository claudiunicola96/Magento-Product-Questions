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
}
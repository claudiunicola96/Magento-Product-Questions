<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:01
 */
class Evozon_QA_Model_Qa extends Mage_Core_Model_Abstract
{
    const PENDING = 'pending';

    protected function _construct()
    {
        $this->_init('evozon_qa/qa');
    }

    /**
     * Save the question in db.
     * Throw Exception if the post isn't right.
     * @param $post
     * @throws Exception
     */
    public function saveQaData($post)
    {
        $this->setData($post)
            ->setStatus(self::PENDING)
            ->setEnable(1)
            ->setCreateAt(date('Y-m-d H:i:s'));
        $this->validateQaPost($this);
        $this->save();
    }

    /**
     * Validate the post.
     * If a validation go wrong, throw Mage Exception
     * @param $postObject
     * @throws Mage_Core_Exception
     */
    private function validateQaPost($postObject)
    {
        // Validate to exist product id in post
        if (empty($postObject->getProductId())) {
            Mage::throwException("Must exist a product id!");
        }

        // Validate product id, must exist in db.
        if (!in_array($postObject->getProductId(), Mage::getModel('catalog/product')->getCollection()->getAllIds())) {
            Mage::throwException("Must exist the product!");
        }

        // Validate to exist customer id in post
        if (empty($postObject->getCustomerId())) {
            Mage::throwException("Must exist a customer id!");
        }

        // Validate customer id, must exist in db.
        if (!in_array($postObject->getCustomerId(),
            Mage::getModel('customer/customer')->getCollection()->getAllIds())
        ) {
            Mage::throwException("Must exist the customer!");
        }

        // Validate question field
        if (empty($postObject->getQuestion())) {
            Mage::throwException("Complete the question field.");
        }
    }
}
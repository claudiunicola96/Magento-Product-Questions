<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 06.01.2016
 * Time: 19:01
 */
class Evozon_QA_Model_Qa extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('evozon_qa/qa');
    }


    /*
     * Validate and save the question in db.
     * Throw Exception if the post isn't right.
     *
     */
    public function saveQaData($post)
    {
        $postObject = new Varien_Object();
        $postObject->setData($post)
            ->setStatus('pending')
            ->setEnable(1)
            ->setCreateAt(date('Y-m-d H:i:s'));

        $this->validateQaPost($postObject);

//        $this->save();

    }

    /*
     * Validate the post.
     * If a validation go wrong, throw Mage Exception
     */
    private function validateQaPost($postObject)
    {
        if (empty($postObject->getProductId())) {
            Mage::throwException("Must exist a product id!");
        }
        

        if (!in_array($postObject->getProductId(), Mage::getModel('catalog/product')->getCollection()->getAllIds())) {
            Mage::throwException("Must exist the product!");
        }

        if (empty($postObject->getCustomerId())) {
            Mage::throwException("Must exist a customer id!");
        }

        if (!in_array($postObject->getCustomerId(), Mage::getModel('customer/customer')->getCollection()->getAllIds())) {
            Mage::throwException("Must exist the customer!");
        }

        if (empty($postObject->getQuestion())) {
            Mage::throwException("Complete the question field.");
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 14.01.2016
 * Time: 01:37
 */
class Evozon_QA_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Add a question.
     * Conditions to add a question are: customer logged, question form not empty.
     * @return Mage_Core_Controller_Varien_Action
     * @throws Exception
     * @throws Zend_Validate_Exception
     */
    public function addQuestionAction()
    {

        $post = $this->getRequest()->getPost();
        if ($post && Mage::getSingleton('customer/session')->isLoggedIn()) {
            try {

                Mage::getModel('evozon_qa/qa')->saveQaData($post);
                Mage::getSingleton('catalog/session')->addSuccess('Question sent to administrator. We\'ll replay as soon posible.');

                return $this->_redirectReferer();

            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('catalog/session')->addNotice($e->getMessage());

                return $this->_redirectReferer();

            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('catalog/session')->addError('Unable to submit your question. Please, try again later');

                return $this->_redirectReferer();

            }
        } else {
            return $this->_redirectReferer();
        }
    }
}
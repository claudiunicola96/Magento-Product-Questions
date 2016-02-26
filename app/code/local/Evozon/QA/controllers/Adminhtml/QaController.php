<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 09.02.2016
 * Time: 00:16
 */
class Evozon_QA_Adminhtml_QaController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Catalog'))->_title($this->__('All Questions'));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('evozon_qa/adminhtml_qa_grid'));
        $this->renderLayout();
        return $this;
    }

    public function pendingAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
}
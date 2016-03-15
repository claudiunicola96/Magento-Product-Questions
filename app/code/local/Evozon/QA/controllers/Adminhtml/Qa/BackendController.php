<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 09.02.2016
 * Time: 00:16
 */
class Evozon_QA_Adminhtml_Qa_BackendController extends Mage_Adminhtml_Controller_Action
{
//    protected function initAction()
//    {
//        $this->loadLayout()->_setActiveMenu('catalog/evozon_qa')
//            ->_addBreadcrumb('questions', 'questions');
//        return $this;
//    }

    /**
     *
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('catalog');
        $this->_addContent($this->getLayout()->createBlock('evozon_qa/adminhtml_qa'));
        $this->renderLayout();
    }

    public function pendingAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function editAction()
    {
        $this->initAction();
        $this->renderLayout();
        return $this;
    }
}
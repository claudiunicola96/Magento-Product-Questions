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
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
}
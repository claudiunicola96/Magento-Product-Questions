<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 26.02.2016
 * Time: 11:49
 */
class Evozon_QA_Block_Adminhtml_Qa_Add extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Evozon_QA_Block_Adminhtml_Qa_Add constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->_controller = 'adminhtml_qa';
        $this->_mode = 'add';
    }

    public function getHeaderText()
    {
        return Mage::helper('review')->__('Add New Question');
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 23.02.2016
 * Time: 15:35
 */
class Evozon_QA_Block_Adminhtml_Qa extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     *
     */
    public function __construct()
    {
        $this->_blockGroup = 'evozon_qa';
        $this->_controller = 'adminhtml_qa';
        $this->_headerText = $this->__('Questions Manager');
        $this->_addButtonLabel = $this->__('Add New Question');
        parent::_construct();
    }
}
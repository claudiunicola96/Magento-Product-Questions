<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 23.02.2016
 * Time: 15:35
 */
class Evozon_QA_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    #TODO _controller _blockgroup? nu intra in constructor aici
    public function __construct()
    {
        $this->_controller = 'adminhtml_qa';
        $this->_blockGroup = 'evozon_qa';
        $this->_headerText = Mage::helper('evozon_qa')->__('Questions Manager');
        $this->_addButtonLabel = Mage::helper('evozon_qa')->__('Add New Question');

        parent::_construct();
    }

    public function getCreateUrl()
    {
        return 'evozon_qa_admin/qa/edit';
    }

}
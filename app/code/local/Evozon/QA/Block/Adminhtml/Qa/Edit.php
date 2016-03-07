<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 26.02.2016
 * Time: 11:41
 */
class Evozon_QA_Block_Adminhtml_Qa_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'evozon_qa';
        $this->_controller = 'adminhtml_qa';

        parent::_construct();

        $this->_updateButton('save', 'label', $this->__('Save Question'));
        $this->_updateButton('delete', 'label', $this->__('Delete Question'));
    }

    public function getHeaderText()
    {
        if (Mage::registry('evozon_qa')->getId()) {
            return $this->__('Edit Question');
        } else {
            return $this->__('New Question');
        }
    }


}
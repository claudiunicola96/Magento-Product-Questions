<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 23.02.2016
 * Time: 15:47
 */
class Evozon_QA_Block_Adminhtml_Qa_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        $this->setId('qaGrid');
        $this->setDefaultSort('create_at');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('evozon_qa/qa')
            ->getCollection()->addProductData();

        $this->setCollection($collection);

        return parent::__construct();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => Mage::helper('evozon_qa')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'id',
            'type' => 'int',
        ));

        $this->addColumn('create_at', array(
            'header' => Mage::helper('evozon_qa')->__('Create On'),
            'align' => 'left',
            'index' => 'create_at',
            'type' => 'datetime',
        ));

        $this->addColumn('update_at', array(
            'header' => Mage::helper('evozon_qa')->__('Update On'),
            'align' => 'left',
            'index' => 'update_at',
            'type' => 'datetime',
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('evozon_qa')->__('Status'),
            'align' => 'left',
            'index' => 'status',
        ));

        $this->addColumn('customer_id', array(
            'header' => Mage::helper('evozon_qa')->__('Customer ID'),
            'align' => 'left',
            'index' => 'customer_id',
        ));

        $this->addColumn('question', array(
            'header' => Mage::helper('evozon_qa')->__('Question'),
            'align' => 'left',
            'index' => 'question',
        ));

        $this->addColumn('answer', array(
            'header' => Mage::helper('evozon_qa')->__('Answer'),
            'align' => 'left',
            'index' => 'answer',
            'renderer' => 'Evozon_QA_Block_Adminhtml_Qa_Renderer_Qa',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('evozon_qa')->__('Product Name'),
            'align' => 'left',
            'index' => 'name',
        ));

        $this->addColumn('sku', array(
            'header' => Mage::helper('evozon_qa')->__('SKU'),
            'align' => 'left',
            'index' => 'sku',
        ));


        return parent::_construct();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/qaGrid', array('_current' => true));
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/jsonQuestionInfo', array('id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        return $this;
    }

}
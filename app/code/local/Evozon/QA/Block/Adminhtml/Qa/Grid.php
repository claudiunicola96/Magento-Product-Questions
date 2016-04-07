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
        parent::__construct();
        $this->setDefaultSort('id');
        $this->setId('qaGrid');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('evozon_qa/qa')
            ->getCollection()->getPreparedCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    protected function _prepareColumns()
    {
        $options = ['pending' => 'Pending', 'approved' => 'Approved'];

        $this->addColumn('id', [
            'header' => Mage::helper('evozon_qa')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'id',
            'type' => 'int',
        ]);

        $this->addColumn('create_at', [
            'header' => Mage::helper('evozon_qa')->__('Create On'),
            'align' => 'left',
            'index' => 'create_at',
            'type' => 'datetime',
        ]);

        $this->addColumn('update_at', [
            'header' => Mage::helper('evozon_qa')->__('Update On'),
            'align' => 'left',
            'index' => 'update_at',
            'type' => 'datetime',
        ]);

        $this->addColumn('status', [
            'header' => $this->__('Status'),
            'align' => 'left',
            'index' => 'status',
            'type' => 'options',
            'options' => $options,
        ]);

        $this->addColumn('customer_name', [
            'header' => $this->__('Customer Name'),
            'align' => 'left',
            'index' => 'customer_name',
            'filter_index' => 'main_table.value',
        ]);

        $this->addColumn('name', [
            'header' => Mage::helper('evozon_qa')->__('Product Name'),
            'align' => 'left',
            'index' => 'name',
            'filter_index' => 'value',
        ]);

        $this->addColumn('sku', [
            'header' => Mage::helper('evozon_qa')->__('SKU'),
            'align' => 'left',
            'index' => 'sku',
        ]);
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }

}
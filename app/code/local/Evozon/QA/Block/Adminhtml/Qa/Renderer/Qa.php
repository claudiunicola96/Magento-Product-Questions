<?php

/**
 * Created by PhpStorm.
 * User: claudiu
 * Date: 23.02.2016
 * Time: 17:34
 */
class Evozon_QA_Block_Adminhtml_Qa_Renderer_Qa extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    const NO_ANSWER = 'no answer';

    public function render(Varien_Object $row)
    {
        $answer = $row->getData('answer');
        if (!$answer) {
            return self::NO_ANSWER;
        }
        return $answer;
    }

}
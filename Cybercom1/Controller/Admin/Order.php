<?php
namespace Controller\Admin;

class Order extends \Controller\Core\Admin 
{
    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Order\Grid');
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $content->addChild($grid);
        $this->toHtmlLayout();
    }
}




?>
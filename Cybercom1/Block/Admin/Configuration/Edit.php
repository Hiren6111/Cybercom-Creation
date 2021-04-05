<?php
namespace Block\Admin\Configuration;

class Edit extends \Block\Core\Edit
{
    function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Configuration\Edit\Tabs'));
    }
  
}

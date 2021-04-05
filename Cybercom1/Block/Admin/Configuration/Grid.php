<?php
namespace Block\Admin\Configuration;

class Grid extends \Block\Core\Template
{
    protected $configs = [];

    public function __construct() {
        
        $this->setTemplate('./View/admin/configuration/grid.php');
    }

    public function setConfiguration($configs = NULL) {
        if(!$configs) {
            $configs = \Mage::getModel('Model\Configuration');
            $configs = $configs->fetchAll();
        }
        $this->configs = $configs;
        return $this;
    }

    public function getConfiguration() 
    {
        if (!$this->configs) {
            $this->setConfiguration();
        }
        return $this->configs;
    }
    
}
?>

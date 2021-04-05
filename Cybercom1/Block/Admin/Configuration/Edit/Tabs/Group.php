<?php 

namespace Block\Admin\Configuration\Edit\Tabs;

class Information extends \Block\Core\Template
{
    protected $configGroup=NULL;
    public function __construct()
    {
        $this->setTemplate("View/admin/configuration/edit/tabs/information.php");
    }

    public function setConfigGroup($configGroup = null)
    {
        if ($configGroup) {
            $this->configGroup = $configGroup;
            return $this;
        }
        $config = \Mage::getModel('Model\Config');

        if ($id = $this->getRequest()->getGet("id")) {

            $configGroup = $configGroup->load($id);
        }
        $this->configGroup = $configGroup;
        return $this;
    }
    public function getConfigGroup()
    {
        if (!$this->configGroup) {
            $this->setConfigGroup();
        }
        return $this->configGroup;
    }
}
?>
<?php
namespace Block\Admin\Configuration\Edit\Tabs;

class Group extends \Block\Core\Edit
{
    protected $configuration = [];
    protected $groups = [];

    public function __construct()
    {
        $this->setTemplate('View/admin/configuration/edit/tabs/group.php');
    }

    public function setConfiguration($configuration = NULL)
    {
        if ($configuration) {
            $this->configuration = $configuration;
            echo "<pre>";
            // print_r($configuration);
            // die;
            // return $this;
        }
        $configuration = \Mage::getModel('Model\Configuration');

        if ($id = $this->getRequest()->getGet('id')) {
            $configuration = $configuration->load($id);
        }
        $this->configuration = $configuration;
        return $this;
    }

    public function getConfiguration()
    {
        if(!$this->configuration)
        {
            $this->setConfiguration();
        }
        return $this->configuration;
    }

    public function setGroups($groups = null){
        if ($groups) {
            $this->$groups = $groups;
            return $this;
        }
        // echo 1;
        // die;
        if($configId = $this->getTableRow()->configId){
            $ConfigurationGroup = \Mage::getModel('Model\Configuration\ConfigGroup');
            $query = "SELECT * FROM {$ConfigurationGroup->getTableName()} WHERE `groupId` = {$configId};";
            $groups = $ConfigurationGroup->fetchAll($query);
            if($groups){
                $this->groups = $groups;
                return $this;
            }
        }
        $this->groups = $groups;
        return $this;
    }

    public function getgroups(){
        if (!$this->groups) {
            $this->setgroups();
        }
        return $this->groups;
    }

}

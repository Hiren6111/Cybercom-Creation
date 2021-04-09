<?php
    namespace Model;

    class Configuration extends \Model\Core\Table
    {
        
        public function __construct() {

            $this->tableName = 'config';
            $this->primaryKey = 'configId';
        }

        public function getGroups()
        {
            $this->setTableName('config_group');
            if (!$this->groupId) {
                return false;
            }
            $query = "SELECT * FROM `{$this->getTableName()}`
            WHERE `groupId` = '{$this->groupId}'";
            $groups = \Mage::getModel('Model\Configuration\ConfigGroup')->fetchAll($query);
            return $groups;
        }

}
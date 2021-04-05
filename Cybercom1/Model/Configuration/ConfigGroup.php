<?php 

namespace Model\Configuration;

class ConfigGroup extends \Model\Core\Table 
{
    public function __construct()
    {
        $this->setTableName('config_group');
        $this->setPrimaryKey('groupId');
    }

}

?>
<?php
    namespace Model;

    class Configuration extends \Model\Core\Table
    {
        
        public function __construct() {

            $this->tableName = 'config';
            $this->primaryKey = 'configId';
        }

}
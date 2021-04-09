<?php
namespace Model;

    class Shipping extends \Model\Core\Table{
        
        const STATUS_ENABLED = 1;
        const  STATUS_DISABLED = 0;

        public function __construct() {
            
            $this->tableName = 'shipping';
            $this->primaryKey = 'shippingId';
        }

        public function getStatusOption(){
            return [
                self::STATUS_ENABLED => "Enabled",
                self::STATUS_DISABLED => "Disabled",
            ];
        }
    }

?>
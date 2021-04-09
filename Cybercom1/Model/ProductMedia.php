<?php
namespace Model;

    class ProductMedia extends \Model\Core\Table{
        
        public function __construct() {
            
            $this->tableName = 'product_media';
            $this->primaryKey = 'imageId';
        }
    }

?>
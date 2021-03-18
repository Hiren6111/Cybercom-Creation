<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

    class ProductMedia extends \Model\Core\Table{
        
        public function __construct() {
            
            $this->tableName = 'product_media';
            $this->primaryKey = 'imageId';
        }
    }

?>
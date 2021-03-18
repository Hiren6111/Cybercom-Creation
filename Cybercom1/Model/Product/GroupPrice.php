<?php
namespace Model\Product;
\Mage::loadFileByClassName('Model\Core\Table');

class GroupPrice extends \Model\Core\Table
{
    public function __construct() {
        $this->primaryKey = 'entityId';
        $this->tableName = 'product_group_price';
    }

}
<?php
namespace Model\Product;

class GroupPrice extends \Model\Core\Table
{
    public function __construct() {
        $this->primaryKey = 'entityId';
        $this->tableName = 'product_group_price';
    }

}
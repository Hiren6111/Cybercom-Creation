<?php
namespace Model\Product\Group;

class Price extends \Model\Core\Table
{
    public function __construct() {
        $this->primaryKey = 'entityId';
        $this->tableName = 'product_group_price';
    }

}
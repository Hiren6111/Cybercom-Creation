<?php
namespace Model\Product;

class Media extends \Model\Core\Table{

    function __construct()
    {
        $this->setTableName('product_media');
        $this->setPrimaryKey('imageId');
    }
}


?>




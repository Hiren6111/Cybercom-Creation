<?php

namespace Controller\Admin;

use Mage;

class Data extends \Controller\Core\Admin{

    public function testAction()
    {
        $query = "SELECT * FROM `product`
        WHERE `productId` = 208";
        $product = Mage::getModel('Model\Product')->fetchRow($query);
        $product->sku = '1011';
        echo "<pre>";
        print_r($product);
    }
}

?>
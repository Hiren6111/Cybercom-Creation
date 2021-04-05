<?php

namespace Block\Admin\Cart;

class Grid extends \Block\Core\Template{

    function __construct()
    {
        $this->setTemplate("View/admin/cart/grid.php");
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        if(!$this->cart){
            throw new \Exception("Error Processing Request", 1);
            
        }
        return $this->cart;
    }

    public function getCustomers()
    {
        return \Mage::getModel('Model\Customer')->fetchAll();
    }

    public function getBillingAddress()
    {
        $billingAddress = \Mage::getModel('Model\Customer\Address');
        $address = \Model\Customer\Address::ADDRESS_TYPE_BILLING;

        $query = "SELECT `address` FROM `{$billingAddress->getTableName()}` WHERE `customerId` = '{$this->getCart()->customerId}' AND `addressType` = '{$address}'";
        return $billingAddress->fetchRow($query);
    }
    public function getShippingAddress()
    {
        $shippingAddress = \Mage::getModel('Model\Customer\Address');
        $address = \Model\Customer\Address::ADDRESS_TYPE_SHIPPING;

        $query = "SELECT `address` FROM `{$shippingAddress->getTableName()}` WHERE `customerId` = '{$this->getCart()->customerId}' AND `addressType` = '{$address}'";
        return $shippingAddress->fetchRow($query);
    }

    


}





?>
<?php

namespace Model\Customer;

class Address extends \Model\Core\Table
{
    protected $billingAddress = null;
    protected $shippingAddress = null;
    const ADDRESS_TYPE_BILLING = "billing";
    const ADDRESS_TYPE_SHIPPING = "shipping";
    const STATUS_ENABLED = 1;
    const  STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->tableName = 'customer_address';
        $this->primaryKey = 'addressId';
    }

    // public function setCustomerBillingAddress($billingAddress)
    //     {
    //         $this->billingAddress = $billingAddress;
    //         return $this;
    //     }

    //     public function getCustomerBilllingAddress()
    //     {
    //         return $this->billingAddress;
    //     }

    //     public function setCustomerShippingAddress($shippingAddress)
    //     {
    //         $this->shippingAddress = $shippingAddress;
    //         return $this;
    //     }

    //     public function getCustomerShippingaddress()
    //     {
    //         return $this->shippingAddress;
    //     }
}

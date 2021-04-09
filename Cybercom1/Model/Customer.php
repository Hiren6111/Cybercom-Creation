<?php
namespace Model;

    class Customer extends \Model\Core\Table{
        const STATUS_ENABLED = 1;
        const  STATUS_DISABLED = 0;
        
        public function __construct() {
            
            $this->tableName = 'customer';
            $this->primaryKey = 'customerId';
        }

        public function getStatusOption(){
            return [
                self::STATUS_ENABLED => "Enabled",
                self::STATUS_DISABLED => "Disabled",
            ];
        }

        public function getCustomerBillingAddress()
        {
            if (!$this->customerId) {
                return false;
            }
            $customerAddress = \Mage::getModel('Model\Customer\Address');
            $query = "SELECT * FROM `{$customerAddress->getTableName()}` WHERE `customerId` = '{$this->customerId}' AND `addressType` = 'Billing'";
            $billingAddress = $customerAddress->fetchRow($query);
            
            if ($billingAddress) {
                $this->setCustomerBillingAddress($billingAddress);
                return $this->billingAddress;
            }
            return null;
        }

        public function setCustomerBillingAddress(\Model\Customer\Address $address)
        {
            $this->billingAddress = $address;
            return $this;
        }

        public function getCustomerShippingAddress()
        {
            if (!$this->customerId) {
                return false;
            }
            $customerAddress = \Mage::getModel('Model\Customer\Address');
            $query = "SELECT * FROM `{$customerAddress->getTableName()}` WHERE `customerId` = '{$this->customerId}' AND `addressType` = 'Shipping'";
            $shippingAddress = $customerAddress->fetchRow($query);
            if ($shippingAddress) {
                $this->setCustomerShippingAddress($shippingAddress);
            }
            return $this->shippingAddress;
        }

        public function setCustomerShippingAddress(\Model\Customer\Address $address)
        {
            $this->shippingAddress = $address;
            return $this;
        }
    }

?>
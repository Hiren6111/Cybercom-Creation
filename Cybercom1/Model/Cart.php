<?php
namespace Model;

class Cart extends \Model\Core\Table 
{
    const PLATINUM = 1;
    const GOLD = 2;
    const SILVER = 3;
    const PLATINUM_FEE = 100;
    CONST GOLD_FEE = 50;
    CONST SILVER_FEE = 0;
    const COD = 1;
    const BHIM_UPI = 2;
    const CREDITCARD = 3;
    const DEBITCARD = 4;
    const NET_BANKING = 5;

    protected $customer = null;
    protected $items = null;
    protected $billingAddress = null;
    protected $shippingingAddress = null;
    protected $payment = null;
    protected $shipment = null;
    public function __construct()
    {
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }

    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer()
    {    
        if ($this->customer) {
            return $this->customer; 
        }
        if (!$this->customerId) {
            return false;
        }
        $customer = \Mage::getModel('Model\Customer')->load($this->customerId);
        $this->setCustomer($customer);
        return $this->customer; 
    }

    public function setItems(\Model\Cart\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * FROM `cart_item` WHERE `cartId` = '{$this->cartId}'";
        $items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);
        if(!$items){
            return false;
        }
        $this->setItems($items);
        return $items;
    }

    public function setBillingAddress($address)
    {
        $this->billingAddress = $address;
        return $this;
    }

    public function getBillingAddress()
    {
        $cartAddress = \Mage::getModel('Model\Cart\Address')->getCartBillingAddress($this->cartId);
        if ($cartAddress) {
            $this->setBillingAddress($cartAddress);
            return $this->billingAddress;
        }
        // print_r($_SESSION);
        // die;
        $customerBillingAddress = $this->getCustomer()->getCustomerBillingAddress();
        if ($customerBillingAddress) {
            $this->setBillingAddress($customerBillingAddress);
            return $this->billingAddress;
        }
        return null;
    }
    
    public function setShippingAddress($address)
    {
        $this->shippingAddress = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        $cartAddress = \Mage::getModel('Model\Cart\Address')->getCartShippingAddress($this->cartId);
        if ($cartAddress) {
            $this->setShippingAddress($cartAddress);
            return $this->shippingAddress;
        }
        $customerShippingAddress = $this->getCustomer()->getCustomerShippingAddress();
        if ($customerShippingAddress) {
            $this->setShippingAddress($customerShippingAddress);
            return $this->shippingAddress;
        }
        return null;
    }

    public function setShippingMethodId(\Model\Shipping $shippingMethodId)
    {
        $this->shippingMethodId = $shippingMethodId;
        return $this;
    }

    public function getShippimgMethodId()
    {
        if (!$this->shippingMethodId) {
            return false;
        }
        $query = "SELECT shippingId FROM `shipping`";
        $shippingMethodId = \Mage::getModel('Model\Shipping')->fetchRow($query);
        $this->setShippingMethodId($shippingMethodId);
        return $this->shippingMethodId; 
    }  

    
    public function setPaymentMethodId(\Model\Payment $paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;
        return $this;
    }
    
    public function getPaymentMethodId()
    {
        if (!$this->paymentMethodId) {
            return false;
        }
        $query = "SELECT paymentId FROM `payment`";
        $payment = \Mage::getModel('Model\Payment')->fetchRow($query);
        $this->setPaymentMethodId($payment);
        return $this->paymentMethodId; 
    }

    public function addItemToCart($product,$quantity = 1,$addMode = false)
    {
        $query =  "SELECT * FROM `cart_item` WHERE `cartId` = '{$this->cartId}' AND `productId` = '{$product->productId}'";
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem = $cartItem->fetchRow($query);

        if($cartItem){
            $cartItem->quantity += $quantity;
            $cartItem->save();
            return true;
        }

        $cartItem=\Mage::getModel("Model\Cart\Item");
            $cartItem->cartId=$this->cartId;
            $cartItem->productId=$product->productId;
            $cartItem->price=$product->price;
            $cartItem->quantity=$quantity;
            $cartItem->discount=$product->discount*$quantity;
            $cartItem->createdDate = date('Y-m-s H:i:s');

            $cartItem->save();

    }
    
    public function getShippingCharge()
    {
        $query = "SELECT `shippingAmount` FROM `{$this->getTableName()}` WHERE customerId = '$this->customerId'";
        $shippingAmount = $this->fetchRow($query)->getData()['shippingAmount'];
        return $shippingAmount;
    } 

    public function getTotal($items)
    {
        $price=0;
        if ($items) {
            foreach ($items->getData() as $key => $item) {
                $price+=($item->price-$item->discount)*$item->quantity;
            }
        }
        return $price;
    }

}

?>
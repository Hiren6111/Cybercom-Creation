<?php
namespace Model;

class Cart extends \Model\Core\Table 
{
    protected $customer = null;
    protected $items = null;
    protected $billingAddress = null;
    protected $shippingingAddress = null;
    protected $paymentMethodId = null;
    protected $shippingMethodId = null;
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
        $customer = $this->getCustomer();
        if (!$customer) {
            return false;
        }
        $customerBillingAddress = $customer->getCustomerBillingAddress();
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
        $customer = $this->getCustomer();
        if (!$customer) {
            return false;
        }
        $customerShippingAddress = $customer->getCustomerShippingAddress();
        if ($customerShippingAddress) {
            $this->setShippingAddress($customerShippingAddress);
            return $this->shippingAddress;
        }
        return null;
    }

    public function setPaymentMethodId(\Model\Payment $paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;
        return $this;
    }

    public function getPaymentMethodId()
    {
        // echo "<pre>";
        // print_r($this);die;
        if (!$this->paymentMethodId) {          
            return false;
        }
        $paymentMethodId = \Mage::getModel('Model\Payment')->load($this->paymentMethodId);
        $this->setPaymentMethodId($paymentMethodId);
        return $this->paymentMethodId;
    }

    public function setShippingMethodId(\Model\Shipping $shipping)
    {
        $this->shippingMethod = $shipping;
        return $this;
    }

    public function getShippingMethodId()
    {
        if (!$this->shippingMethodId) {
            return false;
        }
        $shipping = \Mage::getModel('Model\Shipping')->load($this->shippingMethodId);
        $this->setShippingMethodId($shipping);
        return $this->shippingMethod;
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
            // $cartItem->totalPrice = ($product->price*$quantity)-($cartItem->discount);
            $cartItem->createdDate = date('Y-m-s H:i:s');

            $cartItem->save();

    }
    
    public function getShippingCharge()
    {
        $query = "SELECT `shippingAmount` FROM `{$this->getTableName()}` WHERE `customerId` = '$this->customerId'";
        $shippingAmount = $this->fetchRow($query)->shippingAmount;
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
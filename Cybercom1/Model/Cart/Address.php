<?php 
namespace Model\Cart;

class Address extends \Model\Core\Table 
{
    const ADDRESS_TYPE_BILLING = "billing";
    const ADDRESS_TYPE_SHIPPING = "shipping";
    protected $cart = null;
    protected $address = null;

    public function __construct()
    {
        $this->setTableName('cart_address');
        $this->setPrimaryKey('cartAddressId');
    }

    public function getCart()
    {
        if (!$this->cartId) {
            return false;
        }
        $cart = \Mage::getModel('Model\Cart')->load($this->cartId);
        $this->setCart($cart);
        return $this->cart;
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function setCartBillingAddress(\Model\Cart\Address $address)
    {
        $this->address = $address;
        return $this;
    }

    public function getCartBillingAddress($cartId)
    {
        if (!$cartId) {
            return false;
        }
        $addressType = \Model\Customer\Address::ADDRESS_TYPE_BILLING;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `cartId` = '{$cartId}' AND 'addressType' = '{$addressType}'";
        $address = $this->fetchRow($query);
        if (!$address) {
            return false;
        }
        $this->setCartBillingAddress($address);
        return $this->address;
    }

    public function setCartShippingAddress(\Model\Cart\Address $address)
    {
        $this->address = $address;
        return $this;
    }

    public function getCartShippingAddress($cartId)
    {
        if (!$cartId) {
            return false;
        }
        $addressType = \Model\Customer\Address::ADDRESS_TYPE_SHIPPING;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `cartId` = '{$cartId}' AND 'addressType' = '{$addressType}'";
        $address = $this->fetchRow($query);
        if (!$address) {
            return false;
        }
        $this->setCartShippingAddress($address);
        return $this->address;
    }
}

?>
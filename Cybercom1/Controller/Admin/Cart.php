<?php

namespace Controller\Admin;

class Cart extends \Controller\Core\Admin{

    public function addToCartAction()
    {        
        try {
            $productId = (int)$this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product')->load($productId);
            if(!$product){
                throw new \Exception("Error Processing Request", 1);
                
            }
            $cart = $this->getCart();
            $cart->addItemToCart($product,1,true);
            $this->getMessage()->setSuccess('Added Item in to cart');

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }   
        $this->redirect('index');
    }

    public function getCart($customerId = null)
    {
        $session = \Mage::getModel('Model\Admin\Session');
        if ($customerId) {
            $session->customerId = $customerId;
        }
        // $sessionId = \Mage::getModel('Model\Admin\Session')->getId();
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `{$cart->getTableName()}` WHERE `customerId` = '{$session->customerId}'";
        $cart = $cart->fetchRow($query);
        if ($cart) {
            return $cart;
        }
        $cart = \Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->save();
        return $cart;
    }

    public function indexAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);
        $cart = $this->getCart();
        $grid->setCart($cart);
        $this->toHtmlLayout();
    }
    
    public function deleteAction()
    {
        $id = $this->getRequest()->getGet('id');
        $cartItem = \Mage::getModel("Model\Cart\Item")->load($id);;
        $cartItem->delete();
        $this->redirect('index', null, null, true);
    }

    public function clearCartAction()
    {
        $cartItem = \Mage::getModel("Model\Cart\Item");
        $query = "DELETE FROM `{$cartItem->getTableName()}`";
        $cartItem->delete($query);
        $this->redirect('index', null, null, true);
    }
    
    public function updateAction()
    {
        try {
            $quantities = $this->getRequest()->getPost('quantity');
            $cart = $this->getCart();

            foreach ($quantities as $cartItemId => $quantity) {
                $cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
                $cartItem->quantity = $quantity;
                $cartItem->save();

                $this->getMessage()->setSuccess('Cart Updated');

            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index');
    }

    public function selectCustomerAction()
    {
        $customerId = $this->getRequest()->getPost('customer');
        $this->getCart($customerId);
        $this->redirect('index');
    }
     
    public function savePaymentAction()
    {
        $paymentId = $this->getRequest()->getPost('paymentId');
        $cart = $this->getCart();
        $payment = \Mage::getModel("Model\Payment")->load($paymentId);
        $cart->paymentMethodId = $payment->paymentId;
        $cart->save();
        $this->redirect('index','Cart',null,true);   
    }

    public function saveShippingAction()
    {
        $shippingId = $this->getRequest()->getPost('shippingId');
        $cart = $this->getCart();
        $shipping = \Mage::getModel("Model\Shipping")->load($shippingId);
        $cart->shippingAmount = $shipping->amount;
        $cart->shippingMethodId = $shipping->shippingId;
        $cart->save();
        $this->redirect('index','Cart',null,true);   
    }

    public function billingAddressAction()
    {
        $customerBillingAddress = $this->getCart()->getCustomer()->getCustomerBillingAddress();
        $cartId = $this->getCart()->cartId;
        $customerId = $this->getCart()->customerId;
        $billingAddress = $this->getRequest()->getPost('billing');
        $saveAddress = $this->getRequest()->getPost('saveAddress');
        $cartAddress = \Mage::getModel('Model\Cart\Address');
        $customerAddress = \Mage::getModel('Model\Customer\Address');
        $address = \Model\Customer\Address::ADDRESS_TYPE_BILLING;
        if (!$customerBillingAddress) {
            $query = "INSERT INTO `cart_address`(`cartId`,`addressType`, `address`, `city`, `state`, `country`, `zipCode`) VALUES ('{$cartId}','{$address}','{$billingAddress['address']}','{$billingAddress['city']}','{$billingAddress['state']}','{$billingAddress['country']}','{$billingAddress['zipCode']}')";
            $cartAddress->save($query);
            if ($saveAddress) {
                $query = "INSERT INTO `customer_address`(`customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES ('{$customerId}','{$billingAddress['address']}','{$billingAddress['city']}','{$billingAddress['state']}','{$billingAddress['zipCode']}','{$billingAddress['country']}','{$address}')";
                $customerAddress->save($query);
            }
        }
        if ($billingAddress) {
            $query = "UPDATE `cart_address` SET `city`='{$billingAddress['city']}',`state`='{$billingAddress['state']}',`country`='{$billingAddress['country']}',`zipCode`={$billingAddress['zipCode']} WHERE `cartId`={$cartId}";
            $cartAddress->save($query);
            $query = "UPDATE `customer_address` SET `address`='{$billingAddress['address']}',`city`='{$billingAddress['city']}',`state`='{$billingAddress['state']}',`zipcode`='{$billingAddress['zipCode']}',`country`='{$billingAddress['country']}' WHERE `customerId` = '{$customerId}' AND `addressType`='{$address}'";
            $customerAddress->save($query);
            $customer = \Mage::getModel('Model\Customer');
            $query = "UPDATE `customer` SET `firstName`='{$billingAddress['firstName']}',`lastName`='{$billingAddress['lastName']}',`email`='{$billingAddress['email']}',`phone`='{$billingAddress['phone']}' WHERE `customerId` = '{$customerId}'";
            $customer->save($query);
        }
        $this->redirect('index');
    }
    
    public function shippingAddressAction()
    {
        $address = \Model\Customer\Address::ADDRESS_TYPE_SHIPPING;
        $customerShippingAddress = $this->getCart()->getCustomer()->getCustomerShippingAddress();
        $saveAddress = $this->getRequest()->getPost('saveAddress');
        $customerId = $this->getCart()->customerId;
        $customerAddress = \Mage::getModel('Model\Customer\Address');
        $cartAddress = \Mage::getModel('Model\Cart\Address');
        $cartId = $this->getCart()->cartId;
        $shippingAddress = $this->getRequest()->getPost('shipping');
        if (!$customerShippingAddress) {
            $query = "INSERT INTO `cart_address`(`cartId`,`addressType`, `address`, `city`, `state`, `country`, `zipCode`) VALUES ('{$cartId}','{$address}','{$shippingAddress['address']}','{$shippingAddress['city']}','{$shippingAddress['state']}','{$shippingAddress['country']}','{$shippingAddress['zipCode']}')";
            $cartAddress->save($query);
            if ($saveAddress) {
                $query = "INSERT INTO `customer_address`(`customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES ('{$customerId}','{$shippingAddress['address']}','{$shippingAddress['city']}','{$shippingAddress['state']}','{$shippingAddress['zipCode']}','{$shippingAddress['country']}','{$address}')";
                $customerAddress->save($query);
            }
        }
        if ($shippingAddress) {
            $query = "UPDATE `cart_address` SET `city`='{$shippingAddress['city']}',`state`='{$shippingAddress['state']}',`country`='{$shippingAddress['country']}',`zipCode`={$shippingAddress['zipCode']} WHERE `cartId`={$cartId}";
            $cartAddress->save($query);
            $query = "UPDATE `customer_address` SET `address`='{$shippingAddress['address']}',`city`='{$shippingAddress['city']}',`state`='{$shippingAddress['state']}',`zipcode`='{$shippingAddress['zipCode']}',`country`='{$shippingAddress['country']}' WHERE `customerId` = '{$customerId}' AND `addressType`='{$address}'";
            $customerAddress->save($query);
            $customer = \Mage::getModel('Model\Customer');
            $query = "UPDATE `customer` SET `firstName`='{$shippingAddress['firstName']}',`lastName`='{$shippingAddress['lastName']}',`email`='{$shippingAddress['email']}',`phone`='{$shippingAddress['phone']}' WHERE `customerId` = '{$customerId}'";
            $customer->save($query);
        }
        $this->redirect('index');
    }





    
}

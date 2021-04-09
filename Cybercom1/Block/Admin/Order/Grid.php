<?php

namespace Block\Admin\Order;

class Grid extends \Block\Core\Layout
{
    protected $orders = [];
    public function __construct()
    {
        $this->setTemplate("View/admin/order/grid.php");
    }

    public function setOrders($order = null)
    {
        if (!$this->orders) {
            $orders = \Mage::getModel('Model\Order\Item')->fetchAll();
        }
        $this->orders = $orders;
        // echo "<pre>";
        // print_r($orders);die;
        return $this;
    }

    public function getOrders()
    {
        if (!$this->orders) {
            $this->setOrders();
        }
        return $this->orders;
    }
}

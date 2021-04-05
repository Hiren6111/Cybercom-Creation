<?php
$cart = $this->getCart();
$cartItems = $this->getCart()->getItems();
$customers=$this->getCustomers();
$customerBillingAddress = $cart->getBillingAddress(); 
$customerShippingAddress = $cart->getShippingAddress();
$customer = $this->getCart()->getCustomer();
$discount = $cart->getData()['discount'];
// echo "<pre>";
// print_r($customerBillingAddress);
// die;
?>
<div class="container">
    <a class="btn btn-success" href="<?php echo $this->getUrl('grid', 'product', null, true) ?>">Back to Item </a>
    <br><br><br>
    <form method="POST" id="cartForm" action="<?php echo $this->getUrl('update'); ?>">
        <button class="btn btn-info" type="submit">Update Cart </button>
        <div id="main-content">
        <table>
                <tr>
                    <td>
                        <select name="customer" class="form-control">
                            <option>Select Customer</option>
                            <?php foreach($customers->getData() as $key => $value): ?>
                                <option value="<?php echo $value->customerId ?>"<?php if($value->customerId==$customer->customerId){echo 'Selected';} ?>><?php echo $value->firstName; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><button type="button" class="btn btn-success" onclick="selectCustomer()">Go</button><br></td>
                </tr>
            </table><br>
            <div class="table_data">
                <table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
                    <thead>
                        <th>CartId</th>
                        <th>ProductId</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Row Total</th>
                        <th>Final Total</th>
                        <th>Action</th>

                    </thead>

                    <?php if (!$cartItems) : ?>
                        <tr>
                            <td colspan="11">No Data Found!!!</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($cartItems->getData() as $value) { ?>
                            <tr>

                                <td><?php echo $value->cartId; ?></td>
                                <td><?php echo $value->productId; ?></td>
                                <td><?php echo $value->price; ?></td>
                                <td><input type="number" name="quantity[<?php echo $value->cartItemId ?>]" value="<?php echo $value->quantity ?>"></td>
                                <td><?php echo $value->discount * $value->quantity ?></td>
                                <td><?php echo $value->price * $value->quantity ?></td>
                                <td><?php echo ($value->price * $value->quantity) - ($value->discount * $value->quantity) ?></td>
                                <td><a class="btn btn-danger" href="<?php echo $this->getUrl('delete', null, ['id' => $value->cartItemId]); ?>">Delete</a></td>
                            </tr>
                        <?php } ?>

                        <a class="btn btn-danger" href="<?php echo $this->getUrl('clearCart'); ?>">ClearCart</a>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </form>

    
<form action="<?php echo $this->getUrl('billingAddress'); ?>" method="POST">
    <center>
        <table style="border-collapse: separate; border-spacing: 0 50px;">
            <tr>
                <td>
                    <h4>Order Summary</h4>
                    <?php if (!$cartItems) : ?>
            <tr>
                <td>No records Found</td>
            </tr>
        <?php else : ?>
            <table border="1">
                <thead>
                    <tr>
                        <th style="text-align:center" colspan="2">Product</th>
                        <th style="text-align:center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center">productId</td>
                        <td style="text-align:center">quantity</td>
                        <td style="text-align:center"></td>
                    </tr>
                    <?php foreach ($cartItems->getData() as $key => $item) : ?>
                        <tr>
                            <td style="text-align:center"><?php echo $item->productId; ?>
                            <td style="text-align:center"><?php echo $item->quantity ?></td>
                            <td style="text-align:center"><?php echo $item->price*$item->quantity; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align:center" colspan="2">Subtotal</th>
                        <?php foreach ($cartItems->getData() as $key => $item) : ?>
                            <?php static $subTotal = 0; ?>
                            <?php
                            $b = 0;
                            $b = $item->price;
                            $subTotal += $b;
                            ?>
                        <?php endforeach; ?>
                        <td>
                            <?php echo $subTotal; ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align:center" colspan="2">Tax(%)</th>
                        <?php $tax = ($subTotal * 0.18); ?>
                        <td style="text-align:center"><?php echo $tax; ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:center" colspan="2">Total</th>
                        <td style="text-align:center"><?php echo ($subTotal + $tax); ?></td>
                    </tr>
                </tfoot>
            </table>
            </td>
        <?php endif; ?>
        </tr>
        </table>
        <h1>============================</h1>
        <table class="main" border="1px" >
        <tr>
        <td>
            <?php if($cart->customerId):?>
                <table id="billing">
                    <h4>Billing Address</h4>
                    <tr>
                        <td>
                            <input type="text" name="billing[firstName]" placeholder="First Name*" value="<?php echo $customer->firstName; ?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[lastName]" placeholder="Last Name*" value="<?php echo $customer->lastName; ?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="billing[email]" placeholder="Email Address*" value="<?php echo $customer->email; ?>"><br>
                        </td>
                    </tr>
                    <?php if($customerBillingAddress) :?>
                    <tr>
                        <td>
                            <textarea cols="60" rows="3" name="billing[address]" placeholder="Address"><?php echo $customerBillingAddress->address;?></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[country]" placeholder="Country" value="<?php  echo $customerBillingAddress->country?>" ><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[city]" placeholder="City / Town*" value="<?php echo $customerBillingAddress->city ?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[state]" placeholder="State*" value="<?php echo $customerBillingAddress->state ?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[zipCode]" placeholder="Postcode / ZIP*" value="<?php echo $customerBillingAddress->zipCode ?>"><br><br>
                        </td>
                    </tr>
                    <?php else:?>
                        <tr>
                        <td>
                            <textarea cols="60" rows="3" name="billing[address]" placeholder="Address"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[country]" placeholder="Country" ><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[city]" placeholder="City / Town*" ><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[state]" placeholder="State*" ><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="billing[zipCode]" placeholder="Postcode / ZIP*" ><br><br>
                        </td>
                    </tr>
                    <?php endif;?>
                </table>
                <!-- <tr>
                        <td>
                            <input type="checkbox" name="checkbox" id="checkbox">Same as billing
                        </td>
                    </tr> -->
                <center><button type="submit" class="btn btn-primary">Update Billing Address</button></center><br><br>
            </td>
        </tr>
                <?php endif;?>
    </center>
    
</form>
<td>
<form action="<?php echo $this->getUrl('shippingAddress') ?>" method="post">
    <center>
    <?php if($cart->customerId):?>
                    <table id="shipping">
                        <h4>Shipping Address</h4>
                        <tr>
                            <td>
                                <input type="text" name="shipping[firstName]" placeholder="First Name*" value="<?php echo $customer->firstName; ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[lastName]" placeholder="Last Name*" value="<?php echo $customer->lastName; ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="shipping[email]" placeholder="Email Address*" value="<?php echo $customer->email; ?>"><br>
                            </td>
                        </tr>
                        <?php if($customerShippingAddress) :?>
                        <tr>
                            <td>
                                <textarea cols="60" rows="3" name="shipping[address]" placeholder="Address"><?php echo $customerShippingAddress->address;?></textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[country]" placeholder="Country" value="<?php echo $customerShippingAddress->country; ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[city]" placeholder="City / Town*" value="<?php echo $customerShippingAddress->city ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[state]" placeholder="State*" value="<?php echo $customerShippingAddress->state ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[zipCode]" placeholder="Postcode / ZIP*" value="<?php echo $customerShippingAddress->zipCode ?>"><br><br>
                            </td>
                        </tr>
                        <?php else :?>
                            <tr>
                            <td>
                                <textarea cols="60" rows="3" name="shipping[address]" placeholder="Address"></textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[country]" placeholder="Country"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[city]" placeholder="City / Town*" ><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[state]" placeholder="State*" ><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[zipCode]" placeholder="Postcode / ZIP*" ><br><br>
                            </td>
                        </tr>
                        <?php endif;?>
                    </table>
                    <center><button type="submit" class="btn btn-primary">Update Shipping Address</button></center><br><br>
                </td>
            </tr>
            </td>
        </table>
        <?php endif;?>
</form>
</center>

<form action="<?php echo $this->getUrl('payment'); ?>" method="post">

    <table id="payment">
        <h4>Payment Method</h4>
        <div class="aa-payment-method">
            <select name="payment" class="form-control">
                <option>Select Payment Method</option>
                <option value="COD" <?php if ($cart->getData()['paymentMethodId'] == \Model\Cart::COD) {
                                        echo 'selected';
                                    } ?>>COD</option>
                <option value="Credit Card" <?php if ($cart->getData()['paymentMethodId'] == \Model\Cart::CREDITCARD) {
                                                echo 'selected';
                                            } ?>>Credit Card</option>
                <option value="Debit Card" <?php if ($cart->getData()['paymentMethodId'] == \Model\Cart::DEBITCARD) {
                                                echo 'selected';
                                            } ?>>Debit Card</option>
                <option value="BHIM UPI" <?php if ($cart->getData()['paymentMethodId'] == \Model\Cart::BHIM_UPI) {
                                                echo 'selected';
                                            } ?>>BHIM UPI</option>
                <option value="Net Banking" <?php if ($cart->getData()['paymentMethodId'] == \Model\Cart::NET_BANKING) {
                                                echo 'selected';
                                            } ?>>Net Banking</option>
            </select><br><br>
        </div>
    </table>
    <center><button type="submit" class="btn btn-primary">Update Payment Method </button></center><br><br>
</form>

<form action="<?php echo $this->getUrl('shipment');?>" method="post">

    <table id="shipment">
        <h4>Shipment Service</h4>
        <div class="aa-payment-method">
            <select name="shipment" class="form-control">
                <option>Select Shipping Method</option>
                <option value="Platinum" <?php if ($cart->getData()['shippingMethodId'] == \Model\Cart::PLATINUM) {
                    echo 'selected';
                } ?>>Platinum(1 Day)=>100$</option>
            <option value="Gold" <?php if ($cart->getData()['shippingMethodId'] == \Model\Cart::GOLD) {
                echo 'selected';
            } ?>>Gold(3 Day)=>50$</option>
            <option value="Silver" <?php if ($cart->getData()['shippingMethodId'] == \Model\Cart::SILVER) {
                echo 'selected';
            } ?>>Silver(7 Day)=>Free</option>
        </select><br><br>
        <!-- <button type="button" class="btn btn-success" onclick="selectShipment()">Go</button><br> -->
    </div>
</table>
<center><button type="submit" class="btn btn-primary">Update Shipping Method</button></center><br><br>
</form>

<?php if($cart->customerId):?>
        <table border=3 width="100%">
            <div class="aa-payment-method">
                <tr>
                    <td>Final Total</td>
                    <td>
                        <?php
                        static $total = 0;
                        foreach ($cartItems->getData() as $key => $item) {
                            $b = $item->totalPrice;
                            $total += $b;
                        }
                        print_r($total);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><?php echo $cart->discount; ?></td>
                </tr>
                <tr>
                    <td>Shipping Charges</td>
                    <td><?php print_r($cart->getShippingCharge()); ?></td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>
                        <?php
                        print_r($total + $cart->shippingAmount - ($discount));
                        ?>
                    </td>
                </tr>
            </div>
        </table>
<a href="<?php echo $this->getUrl('grid', 'checkout'); ?>" class="btn btn-info">CheckOut</a><br><br>
        <?php endif;?>
</center>
</form>

</div>
<script type="text/javascript">
    function selectCustomer()
    {
        var form= document.getElementById('cartForm');
        form.setAttribute('Action','<?php echo $this->getUrl('selectCustomer');?>');
        form.submit();
    }
</script>
<?php
$cart = $this->getCart();
$cartItems = $this->getCart()->getItems();
$customers = $this->getCustomers();
$customerBillingAddress = $cart->getBillingAddress();
$customerShippingAddress = $cart->getShippingAddress();
$customer = $this->getCart()->getCustomer();
$payment = $this->getPayment();
$shipping = $this->getShipping();
$discount = $cart->discount;
// echo "<pre>";
// print_r($cartItems);
// die;
?>
<div class="container">
    <a class="btn btn-success" href="<?php echo $this->getUrl('grid', 'product', null, true); ?>">Back to Item </a>
    <br><br><br>
    <form method="POST" id="cartForm" action="<?php echo $this->getUrl('update'); ?>">
        <button class="btn btn-info" type="submit">Update Cart </button>
        <div id="main-content">
            <table>
                <tr>
                    <td>
                        <select name="customer" class="form-control">
                            <option>Select Customer</option>
                            <?php foreach ($customers->getData() as $key => $value) : ?>
                                <option value="<?php echo $value->customerId ?>" <?php if ($value->customerId == $customer->customerId) {
                                                                                        echo 'Selected';
                                                                                    } ?>><?php echo $value->firstName; ?></option>
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


    <hr>
    <center>
        <table border="1">
            <tr>
                <td>
                    <form action="<?php echo $this->getUrl('billingAddress'); ?>" method="POST">
                        <center>
                            <table>
                                <tr>
                                    <td>
                                        <?php if ($cart->customerId) : ?>
                                            <table id="billing">
                                                <h4>Billing Address</h4>
                                                <bold>
                                                    <hr>
                                                </bold>
                                                <?php if ($customerBillingAddress) : ?>
                                                    <tr>
                                                        <td>
                                                            <textarea cols="40" rows="5" name="billing[address]" placeholder="Address"><?php echo ($customerBillingAddress->address); ?></textarea><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="billing[country]" placeholder="Country" value="<?php echo $customerBillingAddress->country; ?>"><br>
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
                                                <?php else : ?>
                                                    <tr>
                                                        <td>
                                                            <textarea cols="40" rows="5" name="billing[address]" placeholder="Address"></textarea><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="billing[country]" placeholder="Country"><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="billing[city]" placeholder="City / Town*"><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="billing[state]" placeholder="State*"><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="billing[zipCode]" placeholder="Postcode / ZIP*"><br><br>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <td><button type="submit" class="btn btn-success">Save</button></td>
                                                </tr>
                                                <tr>
                                                    <td><input class="ml-auto" name="bookAddressBilling" value="1" type="checkbox">
                                                        <label for="save">save to address book</label>
                                                    </td>
                                                </tr>
                                            </table>


                                    </td>
                                </tr>
                            </table>
                        <?php endif; ?>
                        </center>
                    </form>
                </td>
                <td>
                    <form action="<?php echo $this->getUrl('shipmentAddress') ?>" method="post">
                        <center>
                            <?php if ($cart->customerId) : ?>
                                <table>
                                    <tr>
                                        <td>
                                            <table id="shipment">
                                                <h4>Shipping Address</h4><strong>
                                                    <hr>
                                                </strong>
                                                <?php if ($customerShippingAddress) : ?>
                                                    <tr>
                                                        <td>
                                                            <textarea cols="40" rows="5" name="shipping[address]" placeholder="Address"><?php echo ($customerShippingAddress->address); ?></textarea><br>
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
                                                <?php else : ?>
                                                    <tr>
                                                        <td>
                                                            <textarea cols="40" rows="5" name="shipping[address]" placeholder="Address"></textarea><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="shipping[country]" placeholder="Country"><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="shipping[city]" placeholder="City / Town*"><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="shipping[state]" placeholder="State*"><br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="shipping[zipCode]" placeholder="Postcode / ZIP*"><br><br>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <td><button type="submit" class="btn btn-success">Save</button></td>
                                                </tr>
                                                <tr>
                                                    <td><input class="ml-auto" name="bookAddressBilling" value="1" type="checkbox">
                                                        <label for="save">save to address book</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input value="1" name="sameAsBilling" type="checkbox">Same as Billing</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                        </center>
                    </form>
                </td>
            </tr>
        </table><br>
        <hr>
    </center>

    <div class="row">
        <div class="col-lg-6">
            <table class="table table-bordered">
                <form method="post" action="<?php echo $this->getUrl('SavePayment'); ?>">
                    <thead>
                        <tr>
                            <th>Payment Method</th>
                        <tr>
                            <thead>
                            <tbody>
                                <tr>
                                    <td><?php foreach ($payment->getData() as $key => $value) : ?>
                                            <?php echo $value->name; ?><input name="paymentId" type="radio" value="<?php echo $value->paymentId; ?>" <?php if ($value->paymentId == $cart->paymentMethodId) {
                                                                                                                                                            echo "Checked";
                                                                                                                                                        } ?>><br>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Save" class="btn btn-success"></td>
                                </tr>
                            </tbody>
                </form>
            </table>
        </div>

        <div class="col-lg-6">
            <table class="table table-bordered">
                <form action="<?php echo $this->getUrl('saveShipping'); ?>" method="post">
                    <thead>
                        <tr>
                            <th>Shipping Method</th>
                        <tr>
                            <thead>
                            <tbody>
                                <tr>
                                    <td><?php foreach ($shipping->getData() as $key => $value) : ?>
                                            <?php echo $value->name; ?><input name="shippingId" type="radio" value="<?php echo $value->shippingId; ?>" <?php if ($value->shippingId == $cart->shippingMethodId) {
                                                                                                                                                            echo "Checked";
                                                                                                                                                        } ?>><br>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Save" class="btn btn-success"></td>
                                </tr>
                            </tbody>
                </form>
            </table>
        </div>

        <?php if ($cart->customerId) : ?>
            <table border=3 width="100%">
                <div class="aa-payment-method">
                    <tr>
                        <td>Final Total</td>
                        <td>
                            <?php echo $cart->getTotal($cartItems); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Shipping Charges</td>
                        <td><?php echo $cart->getShippingCharge(); ?></td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td>
                            <?php print_r($cart->getTotal($cartItems) + $cart->shippingAmount - ($discount));
                            ?>
                        </td>
                    </tr>
                </div>
            </table>
            <a href="<?php echo $this->getUrl('grid', 'checkout'); ?>" class="btn btn-info">CheckOut</a><br><br>
        <?php endif; ?>
        </center>
        </form>

    </div>

    <script type="text/javascript">
        function selectCustomer() {
            var form = document.getElementById('cartForm');
            form.setAttribute('Action', '<?php echo $this->getUrl('selectCustomer'); ?>');
            form.submit();
        }
    </script>
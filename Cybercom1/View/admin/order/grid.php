<?php $orders = $this->getOrders();
// echo "<pre>";
// print_r($orders->getData());
// die;
?>
<table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
    <tr>
        <td>OrderId</td>
        <td>ProductId</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>RowPrice</td>
        <td>Discount</td>
        <td>Final Total</td>
        <td>Created Date</td>
    </tr>
    <?php foreach ($order->getData() as $key => $value) : ?>
        <tr>
            <td><?php echo $value->orderId ?></td>
            <td><?php echo $value->productId ?></td>
            <td><?php echo $value->quantity ?></td>
            <td><?php echo $value->price ?></td>
            <td><?php echo $value->rowPrice ?></td>
            <td><?php echo $value->discount ?></td>
            <td><?php echo $value->finalTotal ?></td>
            <td><?php echo $value->createdDate ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</form>
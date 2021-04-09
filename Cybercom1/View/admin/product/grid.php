Excellent

<?php/* 
<?php $row = $this->getProducts();?>

<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;">Products</h2>
        <a href="<?php echo $this-> getUrl('edit') ?>" class="btn btn-success" role="button">Add Products</a><br><br>


        <div class="table_data">
            <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
                <thead>
                    <th>Id</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>UpdatedDate</th>
                    <th colspan="4">Action</th>
                </thead>
                
                <tbody id="data-table" align="center">
                <?php if(!$row): ?>
                    <tr>
                        <td colspan="11">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php foreach ($row->getData() as $value) { ?>
                    <tr>

                        <td><?php echo $value->productId; ?></td>
                        <td><?php echo $value->sku;?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->price; ?></td>
                        <td><?php echo $value->discount; ?></td>
                        <td><?php echo $value->quantity; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->status; ?></td>
                        <td><?php echo $value->createdDate; ?></td>
                        <td><?php echo $value->updatedDate; ?></td>
                        <td><a href='<?php echo $this->getUrl('edit', null, ['id' => $value->productId]) ?>' class="btn btn-warning" role="button">Update</a></td>       
                        <td><a href='<?php echo $this->getUrl('delete', null, ['id' => $value->productId]) ?>' class="btn btn-danger" role="button">Delete</a></td>
                        <td><a href='<?php echo $this->getUrl('addToCart','cart',['id' => $value->productId] )?>' class="btn btn-warning btn-sm">Add to Cart</a></td>
                        <td><a href='<?php echo $this->getUrl('index','product_groupPrice', ['id' => $value->productId]) ?>' class="btn btn-warning btn-sm">Group Price</a></td>

                    </tr>
                <?php } endif; ?>

                </tbody>
            </table>

        </div>
        
    </div>
</div>
*/?>
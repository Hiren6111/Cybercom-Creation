<?php require_once "header.php" ?>

<h2 style="text-align:center ;">Product Add Form</h2><br><br>
        <form action="<?php echo $this->getUrl('save');?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 font-weight-bold">
                            <tr>
                                <td>SKU:</td><br>
                                <td><input type="text"  name="product[sku]" value="" class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Name:</td><br>
                                <td><input type="text" name="product[name]" value="" class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Price:</td><br>
                                <td><input type="text"  name="product[price]" value="" class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Status:</td><br>
                                <td><select   name="product[status]">
                                    <option value="enable" class="box">Enable</option>
                                    <option value="disable" class="box">Disable</option>
                                </select></td><br>
                            </tr>
                    </div>

                    <div class="col-lg-6 font-weight-bold">
                            <tr>
                                <td>Discount:</td><br>
                                <td><input type="text"  name="product[discount]" value="" class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Quantity:</td><br>
                                <td><input type="text"  name="product[quantity]" value="" class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Description:</td><br>
                                <td><input type="text"  name="product[description]" value="" class="form-control"></td><br>
                            </tr>
                            <tr>
                                <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                            </tr>        
                    </div>
                </div>

        </form>

        <!-- <div class="footer">
            <p>I am Queen!!!!</p>
        </div>  -->
</body>

</html>

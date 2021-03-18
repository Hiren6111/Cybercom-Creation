<?php //require_once "header.php" ?>
    <div>
        <h1 style="text-align:center">Customer Form</h1><br><br>
    </div>
    <div>
        <form action="<?php echo $this->getUrl('save');?>" method="post">
            <div class="row">
                <div class="col-sm-6 font-weight-bold">
                    <tr>
                        <td>Firstname:</td>
                        <td><input type="text" name="customer[firstname]" value="" class="form-control"></td><br>
                    </tr>
                    <tr>
                        <td>lastname:</td>
                        <td><input type="text" name="customer[lastname]" value="" class="form-control"></td><br>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="customer[email]" value="" class="form-control"></td><br>
                    </tr>
                </div>

                <div class="col-sm-6 font-weight-bold">
                    <tr>
                        <td>Mobile:</td>
                        <td><input type="text" name="customer[mobile]" value="" class="form-control"></td><br>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="customer[password]" value="" class="form-control"></td><br>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td><select  name="customer[status]" class="form-control">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                        </select></td><br><br>
                    </tr>
                </div> 
            </div>       
                    <button type="submit" class="btn btn-primary" value="submit" name="save">Submit</button>
                    
                         
             
        </form>

</body>
</html>






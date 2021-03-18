<?php require_once "header.php" ?>

<h2 style="text-align:center ;">Payment Add Form</h2><br><br>
        <form action="<?php echo $this->getUrl('save');?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 font-weight-bold">

                            <tr>
                                <td>Name:</td><br>
                                <td><input type="text" name="payment[name]"  class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Code:</td><br>
                                <td><input type="text"  name="payment[code]"  class="form-control"></td><br>
                            </tr>
                            <tr>
                                <td>Description:</td><br>
                                <td><input type="text"  name="payment[description]"  class="form-control"></td><br>
                            </tr>
                            
                    </div>

                    <div class="col-lg-6 font-weight-bold">
                            
                            <tr>
                                <td>Status:</td><br>
                                <td><select   name="payment[status]" class="form-control">
                                    <option value="enable" class="box">Enable</option>
                                    <option value="disable" class="box">Disable</option>
                                </select></td><br><br>
                            </tr>
                            
                            <tr>
                                <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                            </tr>        
                    </div>
                </div>

        </form>


</body>

</html>

<?php //require_once "header.php" ?>
    <div>
        <h1 style="text-align:center">Category Form</h1>
    </div>
    <div>
        <form action="<?php echo $this->getUrl('save');?>" method="post">
            <div class="row">
                <div class="col-sm-6 font-weight-bold">
                    Name:<br>
                    <input type="text" name="category[name]" class="form-control"><br>
                            
                    Status:<br>
                    <select  name="category[status]" class="form-control">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select><br>

                    Description:<br>
                    <input type="text" name="category[description]" class="form-control"><br>
                        
                    <button type="submit" class="btn btn-primary" value="submit"  name="save">Submit</button> 
                </div>
            </div>   
        </form>








<?php 
$customergroup = $this->getCustomerGroup();
 $option =$customergroup->getStatusOption(); 
 ?>
 <h2 style="text-align:center ;">CustomerGroup Add/Edit Form</h2><br><br>
 <form action="<?php echo $this->getUrl('save',NULL,['id'=>$customergroup->groupId],true);?>" method="POST" class="form">
<table align="center">
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $customergroup->name; ?>"></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td><select  name="status">
                <?php foreach ($option as $key => $value) {?>
                  <option value="<?php echo $key; ?>" <?php echo $key==$customergroup->status?'selected':'' ?>><?php echo $value ;?></option>

                <?php }?>
            
            </select></td>
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-primary" value="save">Save</button></td>
        </tr>        
</table>
</form>
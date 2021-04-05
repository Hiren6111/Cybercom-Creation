<?php $configs=$this->getConfiguration();
// print_r($configs);die;
?>
<h2 style="text-align: center;">Configuration</h2>
<a class="btn btn-primary" href="<?php echo $this->getUrl('edit')?>">Add New Configuration</a>
<table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
   <tr>
        <td>Config Id</td>
        <td>GroupId</td>
        <td>Title</td>
        <td>Code</td>
        <td>Value</td>
        <td>Created Date</td>
        <td colspan="2">Action</td>
   </tr>
   <?php if(!$configs):?>
   <tr>
        <td colspan="6">No Data Found!!!</td>
   </tr>
   <?php else:?>
   <?php foreach($configs->getData() as $value): ?>
        <tr>
            <td><?php echo $value->configId?></td>
            <td><?php echo $value->groupId?></td>
            <td><?php echo $value->title?></td>
            <td><?php echo $value->code?></td>
            <td><?php echo $value->value?></td>
            <td><?php echo $value->createdDate?></td>
            <td><a class="btn btn-success" href="<?php echo $this->getUrl('edit',null,['id'=>$value->configId]) ;?>">Update</a></td>
            <td><a class="btn btn-danger" href="<?php echo $this->getUrl('delete',null,['id'=>$value->configId]) ;?>">Delete</a></td>
            </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
</table>
</form>
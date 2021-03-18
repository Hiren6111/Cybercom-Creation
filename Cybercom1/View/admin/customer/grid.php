<?php 
$customers = $this->getCustomers();
// echo "<pre>";
// print_r($customers);
// die;
$data = [];
if($customers){
    foreach($customers as $key=>$value){
        $data = $value->getData();
        break;
    }   
}
?>

<h2 style="text-align: center;">Customers</h2>
<a href="<?php echo $this-> getUrl('customerUpdate') ?>" class="btn btn-success" role="button">Add Customer</a><br><br>
<table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
    <?php if(!$customers): ?>
    <tr>
        <td>No Record Found</td>
    </tr>
    <?php else: ?>
    <tr class="gridtr">
        <?php foreach($data as $key=>$value){ ?>
            <th class="gridth"><?php echo $key?></th>
        <?php } ?>
        <th class="gridth" colspan='2'>Action</th>
    </tr>
    <?php foreach ($customers as $key => $value) { ?>
        <?php if($value->addressType == 'Shipping'){continue;} ?>
    <tr class="gridtr">
        <?php foreach($data as $key1=>$value1){ ?>
        <td class="gridtd"><?php echo $value->$key1; ?></td>
        <?php } ?>
        <td class="gridtd" colspan=2>
            <a href = "<?php echo $this->getUrl('customerUpdate',NULL,['id'=>$value->customerId]); ?>" class="btn btn-warning">
                Update
            </a>
            <a href = "<?php  echo $this->getUrl('customerDelete',NULL,['id'=>$value->customerId]); ?>"class="btn btn-Danger">
                Delete
            </a>
        </td>
    </tr>
    <?php } endif; ?>
</table>
<?php $row = $this->getPayments();
// print_r($row);
// die;
?>

<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;"><strong>Payment Records</strong></h2>
        <a href="<?php echo $this->getUrl('edit') ?>" class="btn btn-info" role="button">Add Records</a><br><br>

        <div class="table_data">
            <table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th colspan="2">Action</th>
                </thead>

                <tbody id="data-table" align="center">
                    <?php if (!$row) : ?>
                        <tr>
                            <td colspan="8">No Data Found!!!</td>
                        </tr>
                    <?php else : ?>
                        <?php
                        foreach ($row->getData() as $value) {
                        ?>
                            <tr>
                                <td><?php echo $value->paymentId; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->code; ?></td>
                                <td><?php echo $value->description; ?></td>
                                <td><?php echo $value->status; ?></td>
                                <td><?php echo $value->createdDate; ?></td>
                                <td><a href='<?php echo $this->getUrl('edit', null, ['id' => $value->paymentId],true) ?>' class="btn btn-Success" role="button">Update</a></td>
                                <td><a href='<?php echo $this->getUrl('delete', null, ['id' => $value->paymentId],true) ?>' class="btn btn-danger" role="button">Delete</a></td>
                            </tr>
                    <?php }
                    endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
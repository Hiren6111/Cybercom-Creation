<?php $row = $this->getAdmins(); ?>

<div class="container">
    
        <h2 style="text-align: center;"><strong>Admin Records</strong></h2>
        <a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('update'); ?>').resetParams().load();" class="btn btn-primary">Add New Admin</a><br><br>

        <div class="table_data">
            <table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th colspan="2">Action</th>
                </thead>

                <tbody id="data-table" align="center">
                    <?php if (!$row) : ?>
                        <tr>
                            <td colspan="7">No Data Found!!!</td>
                        </tr>
                    <?php else : ?>
                        <?php
                        foreach ($row->getData() as $value) {
                        ?>
                            <tr>
                                <td><?php echo $value->adminId; ?></td>
                                <td><?php echo $value->userName; ?></td>
                                <td><?php echo $value->password; ?></td>
                                <td><?php echo $value->status; ?></td>
                                <td><?php echo $value->createdDate; ?></td>
                                <td><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('update', null, ['id' => $value->adminId]); ?>').resetParams().load();">Edit</a></td>
      			                <td><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('delete', null, ['id' => $value->adminId]); ?>').resetParams().load();">Delete</a></td>
                            </tr>
                    <?php }
                    endif; ?>
                </tbody>
            </table>

        </div>
</div>

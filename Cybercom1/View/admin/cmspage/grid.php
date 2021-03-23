<?php $row = $this->getCmsPages(); ?>

<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;"><strong>CmsPage Records</strong></h2>
        <a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('cmsPageUpdate'); ?>').resetParams().load();" class="btn btn-primary">Add New CmsPage</a><br><br>

        <div class="table_data">
            <table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
                <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Identifier</th>
                    <th>Content</th>
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
                        <?php foreach ($row->getData() as $value) { ?>

                            <tr>

                                <td><?php echo $value->pageId; ?></td>
                                <td><?php echo $value->title; ?></td>
                                <td><?php echo $value->identifier; ?></td>
                                <td><?php echo $value->content; ?></td>
                                <td><?php echo $value->status; ?></td>
                                <td><?php echo $value->createdDate; ?></td>
                                <td><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('cmsPageUpdate', null, ['id' => $value->pageId]); ?>').resetParams().load();">Edit</a></td>
                                <td><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('cmsPageDelete', null, ['id' => $value->pageId]); ?>').resetParams().load();">Delete</a></td>
                            </tr>
                    <?php }
                    endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
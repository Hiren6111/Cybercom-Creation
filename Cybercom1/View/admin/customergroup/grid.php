<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Customer Group</h2>

       <a href="<?php echo $this-> getUrl('customerGroupUpdate') ?>" class="btn btn-success" role="button">Add New Group</a><br><br>
       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" style="border-collapse:collapse">
               <thead>
                    <th>GroupId</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th colspan="2">Action</th>
               </thead>
               <tbody id="data-table" align="center">
               
                <?php
                    $row = $this->getCustomerGroups();
                    foreach ($row as $key => $value) {
                ?>

                   <tr>
                        <td><?php echo $value->groupId; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->status; ?></td>
                        <td><?php echo $value->createdDate; ?></td>

                       <td><a href='<?php echo $this->getUrl('customerGroupUpdate', null, ['id' => $value->groupId]) ?>' class="btn btn-warning">Update</a></td>      
                        <td><a href='<?php echo $this->getUrl('customerGroupDelete', null, ['id' => $value->groupId]) ?>' class="btn btn-Danger">Delete</a></td>
                   </tr>
               <?php } ?>
               </tbody>
           </table>

       </div>
       
   </div>
        
</div>
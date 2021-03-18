<?php  $row = $this->getAdmins(); ?>

<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       <a href="<?php echo $this-> getUrl('update') ?>" class="btn btn-success" role="button">Add Records</a><br><br>

       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>User Name</th>
                   <th>Password</th>
                   <th colspan="2">Action</th>
               </thead>
               
               <tbody id="data-table" align="center">
               <?php if(!$row): ?>
                    <tr>
                        <td colspan="7">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($row as $value) {
                ?>
               
                   <tr>

                       <td><?php echo $value->adminId; ?></td>
                       <td><?php echo $value->userName; ?></td>
                       <td><?php echo $value->password; ?></td>
                       <td><a href='<?php echo $this->getUrl('update', null, ['id' => $value->adminId]) ?>' class="btn btn-Success" role="button">Update</a></td>      
                        <td><a href='<?php echo $this->getUrl('delete', null, ['id' => $value->adminId]) ?>' class="btn btn-danger" role="button">Delete</a></td>
                   </tr>
               <?php } endif; ?>
               </tbody>
           </table>

       </div>
   </div>
</div>

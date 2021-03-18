<?php
$categories = $this->getCategories();;
// echo "<pre>";
 ?>
 
<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Categories</h2>

       <a href="<?php echo $this-> getUrl('categoryUpdate') ?>" class="btn btn-success" role="button">Add New Category</a><br><br>
       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>Name</th>
                   <th>ParentId</th>
                   <th>Status</th>
                   <th>PathId</th>
                   <th colspan="2">Action</th>
               </thead>
               <tbody id="data-table" align="center">
               <?php if(!$categories): ?>
                    <tr>
                        <td colspan="7">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($categories->getData() as $key => $value) {
                ?>

                   <tr>
                       <td><?php echo $value->categoryId;?></td>
                       <td><?php echo $this->getName($value); ?></td>
                       <td><?php echo $value->parentId; ?></td>
                       <td><?php echo $value->status; ?></td>
                       <td><?php echo $value->pathId; ?></td>

                       <td><a href='<?php echo $this->getUrl('categoryUpdate', null, ['id' => $value->categoryId]) ?>' class="btn btn-warning">Update</a></td>      
                        <td><a href='<?php echo $this->getUrl('categoryDelete', null, ['id' => $value->categoryId]) ?>' class="btn btn-Danger">Delete</a></td>
                   </tr>
               <?php } endif; ?>
               </tbody>
           </table>

       </div>
       
   </div>
        
</div>
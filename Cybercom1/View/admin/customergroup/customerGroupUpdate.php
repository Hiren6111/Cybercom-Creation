<?php //require_once "header.php";
$customerGroup = $this->getCustomerGroup();
?>

<div class="container">
    <h2 style="text-align:center ;">Customer Group Add/Update Form</h2>

        <form method="post" action="<?php echo $this->getUrl('save') ?>">

        <div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="customerGroup[name]" value="<?php echo $customerGroup->name;  ?>">
    
            </div>

            <div class="col-lg-6">
                
                <label for="status" class="font-weight-bold">Status</label> <br>
                <select class="form-control" name="customerGroup[status]">
                    <?php
                    $select = ['enable' => "Enable", 'disable' => "Disable"];
                    foreach ($select as $key => $value) {
                        if ($key === $row[0]['status']) {
                    ?>
                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                    <?php
                        } else {
                        ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php
                        }
                    }
                    ?>
                </select><br>
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>


            </div>
        </div>

        </form>
        
</div>

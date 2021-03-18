<?php //require_once "header.php";
$shipping = $this->getShipping();
?>

<div class="container">
    <h2 style="text-align:center ;">Shipping Add/Update Form</h2>

        <form method="post" action="<?php echo $this->getUrl('save') ?>">
  
        <div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="shipping[name]" value="<?php echo $shipping->name; ?>">

                <label for="description" class="font-weight-bold">Description</label><br> 
                <textarea class="form-control" id="description" name="shipping[description]" rows="3"
                value="<?php echo $shipping->description; ?>"><?php echo $shipping->description; ?></textarea>

                <label for="amount" class="font-weight-bold">Amount</label><br>
                <input type="text" class="form-control"  name="shipping[amount]" value="<?php echo $shipping->amount;  ?>">
    
            </div>

            <div class="col-lg-6">

                <label for="code" class="font-weight-bold">Code</label><br>
                <input type="text" class="form-control"  name="shipping[code]" value="<?php echo $shipping->code;  ?>">
                
                <label for="status" class="font-weight-bold">Status</label> <br>
                <select class="form-control" name="shipping[status]">
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
</div>

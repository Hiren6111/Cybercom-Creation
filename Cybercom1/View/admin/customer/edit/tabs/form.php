<?php
$customer = $this->getCustomer();
$group = $this->getGroup();
$option = $customer->getStatusOption();
?>
<h2 style="text-align:center ;">Customer Add/Update Form</h2><br><br>
<form method="post" action="<?php echo $this->getUrl('save'); ?>">
<div class="row">
            <div class="col-lg-6">

                <label for="firstname" class="font-weight-bold">Firstname</label><br>
                <input type="text" name="customer[firstname]" class="form-control" value="<?php echo $customer->firstName; ?>"><br>

                <label for="lastname" class="font-weight-bold">Lastname</label><br>
                <input type="text" name="customer[lastname]" class="form-control" value="<?php echo $customer->lastName; ?>"><br>
    
                <label for="email" class="font-weight-bold">Email</label><br>
                <input type="email" name="customer[email]" class="form-control" value="<?php echo $customer->email; ?>"><br>
            </div>

            <div class="col-lg-6">
                <label for="groupId" class="font-weight-bold">GroupId</label><br>
                <select name="customer[groupId]">
                    <?php foreach($group as $key=>$value){?>
                    <option value="<?php echo $value['groupId'] ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
                </select><br><br>


                <label for="password" class="font-weight-bold">Password</label><br>
                <input type="password"  name="customer[password]" class="form-control"
                value="<?php echo $customer->password; ?>"><br>
    
                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="customer[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($customer->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>

                <button type="submit" class="btn btn-primary" value="submit">Submit</button>
        </div>
</form>
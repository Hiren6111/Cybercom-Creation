<?php
$admin = $this->getAdmin();
$option = $admin->getStatusOption();
?>

<div class="container">
    <h2 style="text-align:center ;">Admin Add/Update Form</h2>

    <form method="post" id="adminForm" action="<?php echo $this->getUrl('save', 'admin', ['id' => $admin->adminId]); ?>">

        <div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control" name="admin[userName]" value="<?php echo $admin->userName; ?>">


                <label for="password" class="font-weight-bold">Password</label><br>
                <input type="password" class="form-control" name="admin[password]" value="<?php echo $admin->password;  ?>">

            </div>

            <div class="col-lg-6">

                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="admin[status]">
                    <?php foreach ($option as $key => $value) : ?>
                        <option value="<?php echo $key; ?>" <?php if ($admin->status == $key) {
                                                                echo "selected";
                                                            } ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <button type="button" name="save" class="btn btn-warning" onclick="object.resetParams().setForm('#adminForm').load();">Save</button>

            </div>
        </div>

    </form>
</div>
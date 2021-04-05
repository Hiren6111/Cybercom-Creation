<?php $config = $this->getTableRow(); ?>

<h3 style="text-align: center">Configuration Group </h3>

<form action="<?php echo $this->getUrl('save',null,['id'=>$config->configId],true);?>" method="POST">
    <table>
        <tr>
            <td>GroupId:</td>
            <td><input type="text" name="config[name]" value="<?php echo $config->groupId; ?>"></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="config[name]" value="<?php echo $config->name; ?>"></td>
        </tr>
        <tr>
        <tr>
        <td><input type="submit" value="save"></td>
        </tr>

    </table>

</form>
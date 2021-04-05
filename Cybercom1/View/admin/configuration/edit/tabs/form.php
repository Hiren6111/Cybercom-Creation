<?php $config = $this->getTableRow();
// echo "<pre>";
// print_r($config);
// die;?>

<h3 style="text-align: center">Configuration Add\Update Form </h3>

<form action="<?php echo $this->getUrl('save',null,['id'=>$config->configId],true);?>" method="POST">
    <table>
        <tr>
            <td>GroupId:</td>
            <td><input type="text" name="config[groupId]" value="<?php echo $config->groupId; ?>"></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="config[title]" value="<?php echo $config->title; ?>"></td>
        </tr>
        <tr>
            <td>Code:</td>
            <td><input type="text" name="config[code]" value="<?php echo $config->code; ?>"></td>
        </tr>
        <tr>
            <td>Value:</td>
            <td><input type="text" name="config[value]" value="<?php echo $config->value; ?>"></td>
        </tr>
        <tr>
        <td><input type="submit" value="save"></td>
        </tr>

    </table>

</form>
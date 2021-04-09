<?php $config = $this->getConfiguration();
// echo "<pre>";
// print_r($config);
// die;
?>
<form action="<?php echo $this->getUrl('update','Configuration_Group'); ?>" method="POST">
    <input type="submit" name="update" value="update" class = "btn btn-info">
    <input type="button" name="addOption" value="Add Group" class = "btn btn-info" onclick="addRow();">
    <table id='existingOption'>
            <?php if (!$config) : ?>
                <tr>
                    <td colspan="3">
                        <center>No recoreds in Database.</center>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($config->getGroups()->getData() as $key => $option) : ?>
                    <tr>
                        <td><input type="text" name="exist[<?php echo $option->groupId; ?>][name]" value="<?php echo $option->name ?>"></td>
                        <td><input type="button" name="removeGroup" value="Remove Group"  onclick="removeRow(this);"></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
    </table>
</form>
<div style="display:none">
    <table id='newOption'>
        <tbody>
            <tr>
                <td><input type="text" name="new[name][]"></td>
                <td><input type="submit" name="removeGroup" value="Remove Group" onclick="removeRow(this)"></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function addRow() {
        var newOptionTable = document.getElementById('newOption');
        var existingOptionTable = document.getElementById('existingOption').children[0];
        existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
    }

    function removeRow(button) {
        var objTr = button.parentElement.parentElement;
        objTr.remove();
    }
</script>
<?php $attribute = $this->getAttribute();
echo "<pre>";
// print_r($attribute);
// die;
?>
<form action="<?php echo $this->getUrl('update','Attribute_Option'); ?>" method="POST">
    <input type="submit" name="update" value="update" class = "btn btn-info">
    <input type="button" name="addOption" value="Add Option" class = "btn btn-info" onclick="addRow();">
    <table id='existingOption'>
            <?php if (!$attribute) : ?>
                <tr>
                    <td colspan="3">
                        <center>No recoreds in Database.</center>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($attribute->getOptions()->getData() as $key => $option) : ?>
                    <tr>
                        <td><input type="text" name="exist[<?php echo $option->optionId; ?>][name]" value="<?php echo $option->name ?>"></td>
                        <td><input type="text" name="exist[<?php echo $option->optionId; ?>][sortOrder]" value="<?php echo $option->sortOrder ?>"></td>
                        <td><input type="button" name="removeOption" value="Remove Option"  onclick="removeRow(this);"></td>
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
                <td><input type="text" name="new[sortOrder][]"></td>
                <td><input type="submit" name="removeOption" value="Remove Option" onclick="removeRow(this)"></td>
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
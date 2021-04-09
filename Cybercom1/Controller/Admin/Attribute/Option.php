<?php
namespace Controller\Admin\Attribute;

class Option extends \Controller\Core\Admin
{
    public function updateAction()
    {
        $ids=[];
        $attribute = \Mage::getModel('Model\Attribute\Option');
        $attributeId = $this->getRequest()->getGet('id');

        // echo "<pre>";
        // print_r($attributeId);
        // die;
        $query =  "SELECT `optionId` FROM `attribute_options` WHERE `attributeId`={$attributeId}";
        $attributes = $attribute->fetchAll($query);
        if ($attributes) {
            foreach ($attributes->getData() as $key => $value) {
                $ids[] = $value->optionId;
            }
        }
        // print_r($ids);
        // die;

        if ($exist = $this->getRequest()->getPost('exist')) {
            foreach ($exist as $key => $value) {
                unset($ids[array_search($key, $ids)]);
                $query = "UPDATE `attribute_options` 
                    SET `name`='{$value['name']}',`attributeId`={$attributeId},`sortOrder`={$value['sortOrder']} 
                    WHERE `optionId` = {$key}";
                $attribute->save($query);
            }
        }
       
        if ($ids) {
            
            $query = "DELETE FROM `attribute_options` WHERE `optionId` IN (" . implode(",", $ids) . ")";
            $attribute->save($query);
        }
        // echo 1;
        // die;

        if ($new = $this->getRequest()->getPost('new')) {
            echo "<pre>";
            foreach ($new as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $newArray[$key2][$key] = $value2;
                }
            }
            // print_r($newArray);die;
            foreach ($newArray as $key => $value) {
                echo $query = "INSERT INTO `attribute_options`(`name`, `attributeId`, `sortOrder`) 
                    VALUES ('{$value['name']}',{$attributeId},{$value['sortOrder']})";
                $attribute->save($query);
            }
        }
        $this->redirect('grid', 'Attribute', null, true);
    }
}
?>
<?php
namespace Controller\Admin\Configuration;

class Group extends \Controller\Core\Admin
{
    public function updateAction()
    {
        $ids=[];
        $config = \Mage::getModel('Model\Configuration\ConfigGroup');
        $configId = $this->getRequest()->getGet('id');

        // echo "<pre>";
        // print_r($configId);
        // die;
       $query = "SELECT `groupId` FROM `config_group` WHERE `groupId`={$configId}";
        $configuration = $config->fetchAll($query);
        if ($configuration) {
            foreach ($configuration->getData() as $key => $value) {
                $ids[] = $value->groupId;
            }
        }
        // print_r($ids);
        // die;

        if ($exist = $this->getRequest()->getPost('exist')) {
            foreach ($exist as $key => $value) {
                unset($ids[array_search($key, $ids)]);
                  $query = "UPDATE `config_group` 
                    SET `name`='{$value['name']}'
                    WHERE `groupId` = {$key}";
                $config->save($query);
            }
        }
       
        if ($ids) {
            
            echo $query = "DELETE FROM `config_group`
             WHERE `groupId` 
             IN (" . implode(",", $ids) . ")";
             die;
            $config->save($query);
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
                echo $query = "INSERT INTO `config_group`(`name`) 
                    VALUES ('{$value['name']}')";
                $config->save($query);
            }
        }
        $this->redirect('grid', 'Configuration', null, true);
    }
}
?>
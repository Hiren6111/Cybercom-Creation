<?php

namespace Controller\Admin;


class Configuration extends \Controller\Core\Admin
{

    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Configuration\Grid');

        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid);
        echo $layout->toHtml();
    }

    public function saveAction(){

        try{
            $configuration = \Mage::getModel('Model\Configuration');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $configuration = $configuration->load($id);
                if (!$configuration){
                    throw new \Exception ("Records not found.");
                }
            }
            $configurationData = $this->getRequest()->getPost('config'); 
            $configuration->setData($configurationData);
            // echo "<pre>";
            // print_r($configuration);
            // die;
            $configuration->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');    
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect("grid",null,null,true);
    }
    public function editAction()
    {
        try {
            $layout = $this->getLayout(); 
            $content = $layout->getChild('content');
            $layout->setTemplate('./View/core/layout/three_column.php');
            $config = \Mage::getModel('Model\Configuration');
            // echo "<pre>";
            // print_r($config);
            // die;
            if ($id = (int)$this->getRequest()->getGet('id')){   
                $config = $config->load($id);
            }
            $editBlock =  \Mage::getBlock('Block\Admin\Configuration\Edit')->setTableRow($config);
            $content->addChild($editBlock);
            $this->toHtmlLayout();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function  deleteAction()
    {
        $id = $this->getRequest()->getGet('id');

        $config = \Mage::getBlock("Model\Configuration");

        $config->load($id);

        if ($id != $config->configId) {
            throw new \Exception('Id is Invalid');
        }
        $config->delete();
        $this->redirect('grid', null, null, true);
    }

}
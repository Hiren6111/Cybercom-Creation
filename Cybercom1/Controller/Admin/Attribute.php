<?php

namespace Controller\Admin;

class Attribute extends \Controller\Core\Admin
{

    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid');

        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid);
        echo $layout->toHtml();
    }

    public function editAction()
    {
        $layout = $this->getLayout(); 
        $content = $layout->getChild('content');
        $layout->setTemplate('./View/core/layout/three_column.php');
        $attribute = \Mage::getModel('Model\Attribute');
        
        if ($id = (int)$this->getRequest()->getGet('id')){   
            $attribute = $attribute->load($id);
        }
        $editBlock =  \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute);
        // echo "<pre>";
        // print_r($editBlock);
        // die;
        $content->addChild($editBlock);
        $this->toHtmlLayout();
    }

    public function saveAction()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $data = $this->getRequest()->getPost('attribute');
        if ($id = $this->getRequest()->getGet('id')) {
            // echo 2;
            $attribute->load($id)->getData($data);
            $attribute->attributeId = $id;
        }
        $attribute->setData($data);
        $attribute->save();
        $this->redirect('grid', null, null, true);
    }

    public function optionAction()
    {
        $option = \Mage::getModel('Model\Attribute\Option');
        if ($id = $this->getRequest()->getGet('optionId')) {
            $option->load($id);
        }
        $optionBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs\Option');
        $optionBlock->setAttribute($option);
        $layout = $this->getLayout();
        $layout->getContent()->addChild($optionBlock);
        $layout->toHtml();
    }

    // public function updateAction()
    // {

    //     $layout = $this->getLayout();
    //     $content = $layout->getChild('content');
    //     $layout->setTemplate('./View/core/layout/three_column.php');
    //     $attribute = \Mage::getModel('Model\Attribute');
    //     if ($id = (int)$this->getRequest()->getGet('id'))
    //     {
    //         $attribute = $attribute->load($id);
    //     }
    //     $editBlock =  \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute);
    //     $content->addChild($editBlock);
    //     $this->toHtmlLayout();
    // }

    public function  deleteAction()
    {
        $id = $this->getRequest()->getGet('id');

        $attribute = \Mage::getBlock("Model\Attribute");

        $attribute->load($id);

        if ($id != $attribute->attributeId) {
            throw new \Exception('Id is Invalid');
        }
        $attribute->delete();
        $this->redirect('grid', null, null, true);
    }
}

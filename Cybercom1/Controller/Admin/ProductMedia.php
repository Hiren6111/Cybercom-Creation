<?php

Mage::loadFileByClassName('Controller_Core_Admin');

class Controller_Admin_ProductMedia extends Controller_Core_Admin
{
    public function indexAction()
    {
        $this->toHtmlLayout();
    }

    public function gridAction()
    {
        try {
            $gridBlock = Mage::getBlock('Block_Admin_Product_Grid');
            $this->getLayout()->getChild('content')->addChild($gridBlock);
            $this->toHtmlLayout();

        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->redirect('Product','grid');
        }       
    }
    // public function productUpdateAction()
    // {
    //     try{
    //         $gridBlock = Mage::getBlock('Block_Product_Edit');
    //         $gridBlock->setController($this);
    //         $layout = $this->getLayout();
    //         $layout->getLeft()->addChild(Mage::getBlock('Block_Product_Edit_Tabs'));
    //         $layout->setTemplate('./View/core/layout/three_column.php');
    //         $content = $layout->getChild('content');
    //         $content->addChild($gridBlock);
    //         $this->toHtmlLayout();

        
    //     }catch(\Exception $e){
    //         echo $e->getMessage();
           
    //     }
// }

    public function saveAction()
    {
        // echo  111;
        // $photo = $_FILES['image']['name'];
        print_r($_FILES['photo']);
}
}
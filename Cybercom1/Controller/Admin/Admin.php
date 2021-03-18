<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');


class Admin extends \Controller\Core\Admin{
    protected $admins = [];

    public function gridAction (){
       
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Admin\Grid');
            $gridBlock->setController($this);
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    
    
    public function saveAction(){

        try{
            $admin = \Mage::getModel('Model\Admin');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $admin = $admin->load($id);
                if (!$admin){
                    throw new \Exception ("Records not found.");
                }

            }
            $adminData = $this->getRequest()->getPost('admin'); 
            $admin->setData($adminData);
            $admin->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');    
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect("grid",null,null,true);
    }
       
    public function updateAction()
    {
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Admin\Edit');
            $gridBlock->setController($this);
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/three_column.php');
            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();

        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        //require_once './View/admin/admin/adminUpdate.php';
        
    }
    
    
    public function deleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $admin = \Mage::getModel('Model\Admin');
            //$admin = $this->getadmin();
            $admin->load($id);
            if($admin->delete()) {
                $this->getMessage()->setSuccess('Record Deleted Successfully.');
            }
            else {
                $this->getMessage()->setFailure('Unable to Delete Record.');
            }
        }
        catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
        $this->redirect("grid",null,null,true);
    }
    
}


?>



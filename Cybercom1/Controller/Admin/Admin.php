<?php
namespace Controller\Admin;

class Admin extends \Controller\Core\Admin{
    protected $admins = [];

    public function gridAction (){ 
        $grid = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
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
        $contentForm=\Mage::getBlock("Block\Admin\Admin\Edit")->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $contentForm,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
        
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



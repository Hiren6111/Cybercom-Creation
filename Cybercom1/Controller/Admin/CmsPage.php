<?php
namespace Controller\Admin;

class CmsPage extends \Controller\Core\Admin{
    protected $cmsPages = [];

    public function gridAction (){
        $grid = \Mage::getBlock('Block\Admin\CmsPage\Grid')->toHtml();
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
            $cmsPage = \Mage::getModel('Model\CmsPage');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $cmsPage = $cmsPage->load($id);
                if (!$cmsPage){
                    throw new \Exception ("Records not found.");
                }
                // $cmsPage->updatedDate = date("Y-m-d H:i:s");
            }
            else {
                $cmsPage->createdDate = date("Y-m-d H:i:s");
            }
            $cmsPageData = $this->getRequest()->getPost('cmsPage'); 
            $cmsPage->setData($cmsPageData);
            $cmsPage->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');    
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        $this->redirect("grid",null,null,true);
    }
       
    public function cmsPageUpdateAction()
    {
        $contentForm=\Mage::getBlock("Block\Admin\CmsPage\Edit")->toHtml();
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
    
    
    public function cmsPageDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $cmsPage = \Mage::getModel('Model\CmsPage');
            //$cmsPage = $this->getcmsPage();
            $cmsPage->load($id);
            if($cmsPage->delete()) {
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



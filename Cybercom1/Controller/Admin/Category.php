<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Controller\Core\Admin {
    protected $category = NULL;

   public function gridAction()
    {
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Category\Grid');
            $gridBlock->setController($this);
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    public function saveAction()
    { 
        try {
            $category = \Mage::getModel('Model\Category');
            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }

            if ($id = $this->getRequest()->getGet('id')) {
                $category = $category->load($id);
                $pathId = $category->pathId;
                if (!$category){
                    throw new \Exception ("Records not found.");
                }
                $categoryData = $this->getRequest()->getPost('category'); 
                $category->setData($categoryData);
                $pathId = $category->pathId;
                $category->updatePathId();
                $category->updateChildrenPathIds($pathId);
            }
            else {
                $categoryData = $this->getRequest()->getPost('category'); 
                $category->setData($categoryData);
                $id = $category->save();
                $category->load($id);
                $category->updatePathId();
            }
        } 
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect("grid",null,null,true);
    }

    public function categoryUpdateAction()
    {
        try{
            $edit =  \Mage::getBlock('Block\Admin\Category\Edit');
            $layout = $this->getLayout(); 
            $layout->setTemplate("View/core/layout/three_column.php");
            $content = $layout->getChild('content');
            $content->addChild($edit);
            $this->toHtmlLayout();
        }
        catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
    }

    public function categoryDeleteAction()
    { 
        try {
            $category=\Mage::getModel("Model\Category");

            if ($categoryId = $this->getRequest()->getGet('id')) {
                $category = $category->load($categoryId);
                if (!$category) {
                    throw new \Exception("Id is Invalid");
                }
            }
            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildrenPathIds($pathId, $parentId, $categoryId);
            
            $category->delete();
        }  
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }   
        $this->redirect("grid",null,null,true);     
    }
}

?>
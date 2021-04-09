<?php
namespace Controller\Admin;

class Payment extends \Controller\Core\Admin{
    protected $payments = [];
    
    
    public function gridAction (){
       
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Payment\Grid');
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
            $payment = \Mage::getModel('Model\Payment');
            
            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $payment = $payment->load($id);
                if (!$payment){
                    throw new \Exception ("Records not found.");
                }
            }
            else {
                $payment->createdDate = date("Y-m-d H:i:s");
            }
            $paymentData = $this->getRequest()->getPost('payment'); 
            $payment->setData($paymentData);
            $payment->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');    
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        $this->redirect("grid",null,null,true);
    }
       
    public function editAction()
    {
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Payment\Edit');
            $gridBlock->setController($this);
            $layout = $this->getLayout();
            $layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\Payment\Edit\Tabs'));
            $layout->setTemplate('./View/core/layout/three_column.php');
            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();

        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        $this->redirect('grid',null,null,true);
        
    }
    
    
    public function deleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $payment = \Mage::getModel('Model\Payment');
            //$payment = $this->getPayment();
            $payment->load($id);
            if($payment->delete()) {
                $this->getMessage()->setSuccess('Record Deleted Successfully.');
            }
            else {
                $this->getMessage()->setFailure('Unable to Delete Record.');
            }
        }
        catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
        $this->redirect('grid',null,null,true);
    }
    
}


?>






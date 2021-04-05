<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Product extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try {
            $gridBlock = \Mage::getBlock("Block\Admin\Product\Grid");
            $layout = $this->getLayout();

            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $layout->setTemplate("View/core/layout/one_column.php");
            echo $layout->toHtml();

            $message = $this->getMessage();
            echo $message->getSuccess();
            $message->clearSuccess();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    
    public function saveAction(){
        try{
            $product = \Mage::getModel('Model\Product');
            
            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $product = $product->load($id);
                if (!$product){
                    throw new \Exception ("Records not found.");
                }
                $product->updatedDate = date("Y-m-d H:i:s");
                
            }
            else {
                $product->createdDate = date("Y-m-d H:i:s");
            }
            $productData = $this->getRequest()->getPost('product'); 
            $product->setData($productData);
            // echo "<pre>";
            // print_r($product);
            // die;
            $product->save();
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
        try {
            $layout = $this->getLayout(); 
            $content = $layout->getChild('content');
            $layout->setTemplate('./View/core/layout/three_column.php');
            $product = \Mage::getModel('Model\Product');
            if ($id = (int)$this->getRequest()->getGet('id')){   
                $product = $product->load($id);
            }
            $editBlock =  \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product);
            $content->addChild($editBlock);
            $this->toHtmlLayout();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');

            $product = \Mage::getModel("Model\Product");
            $product->load($id);
            if ($id != $product->productId) {
                throw new \Exception . ('Id is Invalid');
            }
            if ($product->delete()) {
                $this->getMessage()->setSuccess("Delete Successfully");
            }

            $this->redirect('grid', null, null, true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    
    public function productMediaAction()
    {
        $media = \Mage::getModel('Model\Product\Media');
        $id = $this->getRequest()->getGet('id');

        if ($this->getRequest()->getPost('image')) {
            $name = $_FILES['imagefile']['name'];
            $extension = strtolower(substr($name, strpos($name, '.') + 1));
            $type = $_FILES['imagefile']['type'];
            $tmp_name = $_FILES['imagefile']['tmp_name'];
            $location = 'Images/Products/';
            if (move_uploaded_file($tmp_name, $location . $name)) {
                $media->image = $location . $name;
                $media->label = $name;
                $media->productId = $id;
                $data = $media->getData();
                $query = "INSERT INTO `{$media->getTableName()}` (" . implode(",", array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
                $media->save($query);
                header("location:" . $this->getUrl('form'));
            }
        }

        if ($this->getRequest()->getPost('remove')) {
            $ids = $this->getRequest()->getPost('delete');

            if ($ids) {

                foreach ($ids as $key => $value) {
                    $media->load($key);
                    $id = $media->imageId;
                    if (unlink($media->image)) {
                        $query = "Delete FROM `product_media` WHERE `imageId` = $id";
                        $media->delete($query);
                    }
                }
            }
            header("location:" . $this->getUrl('form'));
        }

        if ($this->getRequest()->getPost('update')) {
            $data = $this->getRequest()->getPost();
            echo "<pre>";
            print_r($data);
            $radio['small'] = $data['small'];
            $radio['thumb'] = $data['thumb'];
            $radio['base'] = $data['base'];
            foreach ($data['label'] as $key => $value) {
                $query = "UPDATE `{$media->getTableName()}` SET `label` = '{$data['label'][$key]}',";
                foreach ($radio as $key2 => $value2) {
                    if ($value2 == $key) {
                        $query .= "`{$key2}` = 1,";
                    } else {
                        $query .= "`{$key2}` = 0,";
                    }
                }

                $query .= "`gallery` = ";
                if (array_key_exists('gallery', $data) && array_key_exists($key, $data['gallery'])) {
                    $query .= "1";
                } else {
                    $query .= "0";
                }
                $query .= " WHERE `imageId` = {$key}";
                $media->save($query);
            }
            $this->redirect('grid', 'product');
        }
    }
    
    public function formAction()
    {
        try {
            $formBlock = \Mage::getBlock("Block\Admin\Product\Edit");

            $layout = $this->getLayout();

            $content = $layout->getChild('content');
            $content->addChild($formBlock);
            $layout->setTemplate("View/core/layout/three_column.php");

            $left = $layout->getChild('left');
            $leftContent = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
            $left->addChild($leftContent);

            echo $layout->toHtml();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);
        }
    }
    
}

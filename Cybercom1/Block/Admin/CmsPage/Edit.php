<?php
namespace Block\Admin\CmsPage;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    // protected $cmsPage = NULL;

    public function __construct() {
        $this->setTabClass(\Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs'));
    }

    // public function setCmsPage($cmsPage = NULL){
    //     if (!$cmsPage){
    //         $cmsPage = \Mage::getModel('Model\CmsPage');
    //         if($id = $this->getRequest()->getGet('id')){
    //             $cmsPage = $cmsPage->load($id);
    //         }
    //     }
    //     $this->cmsPage = $cmsPage;
    //     return $this;
    // }
    
    // public function getCmsPage(){
    //     if (!$this->cmsPage){
    //         $this->setCmsPage();
    //     }
    //     return $this->cmsPage;
    // }

    
}
?>
<?php

namespace Block\Admin\CmsPage\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        $this->addTab('CmsPage',['label' => 'CmsPage Information','block' => 'Block\Admin\CmsPage\Edit\Tabs\Form']);
        $this->setDefaultTab('CmsPage');
        return $this;
    }
}
?>
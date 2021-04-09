<?php

namespace Block\Admin\Attribute\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    
    public function prepareTabs()
    {
        $this->addTab('form', ['label' => 'Attribute Information', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        if($id =$this->getRequest()->getGet('id')){
        $this->addTab('option', ['label' => 'Option', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
        }
        $this->setDefaultTab('form');
        return $this;
    }
    
}
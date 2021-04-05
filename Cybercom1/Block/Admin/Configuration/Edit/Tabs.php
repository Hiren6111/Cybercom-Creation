<?php

namespace Block\Admin\Configuration\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        $this->addTab('information', ['key' => 'information', 'label' => 'Information', 'block' => 'Block\Admin\Configuration\Edit\Tabs\Form']);
        $this->addTab('group', ['key' => 'group', 'label' => 'Group', 'block' => 'Block\Admin\Configuration\Edit\Tabs\Group']);
        $this->setDefaultTab('information');
        return $this;
    }
    
}

<?php

namespace Block\Admin\Configuration\Edit\Tabs;

class Form extends \Block\Core\Edit
{
    function __construct()
    {
        $this->setTemplate('View/admin/configuration/edit/tabs/form.php');
    }
}

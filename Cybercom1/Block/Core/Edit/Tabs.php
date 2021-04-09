<?php
namespace Block\Core\Edit;

class Tabs extends \Block\Core\Template
{
    protected $tableRow = null;
    protected $defaultTab = null;
    protected $tabs = [];
    
    public function __construct() {
        $this->setTemplate('./View/core/edit/tabs.php');
        $this->prepareTabs();
    }

    public function setTableRow(\Model\Core\Table $tableRow=null)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        if(!$this->tableRow){
            $this->setTableRow(); 
        }
        return $this->tableRow;
    }

    public function prepareTabs()
    {
        return $this;
    }
}
?>
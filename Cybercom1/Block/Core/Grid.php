<?php 
namespace Block\Core;

use Mage;

class Grid extends Template
{
     protected $collection = Null;
     protected $pager = null;
     protected $columns = [];
     protected $actions = [];
     protected $status = [];
     protected $buttons = [];
     protected $filter = [];
     protected $filterButton = [];

     function __construct()
    {
        $this->setTemplate('View\core\grid.php');
        $this->prepareCollection();
        $this->prepareColumns();
        $this->prepareActions();
        $this->prepareButtons();
        $this->prepareFilter();
        $this->prepareFilterButton();
    } 

    public function setCollection($collection)
    {
        $this->collection = $collection;
        return $this;
    }

    public function getCollection()
    {
        if(!$this->collection){
            $this->prepareCollection();
        }
        return $this->collection;
    }

    public function getPager()
    {
        if(!$this->pager){
            return Mage::getController('Controller\Core\Pager');
        }
        return $this->pager;
    }

    public function setPager(\Controller\Core\Pager $pager)
    {
        $this->pager = $pager;
    }

    public function prepareCollection()
    {
        return $this;
    }

    public function addButton($key , $value)
    {
        $this->buttons[$key] = $value;
        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function prepareButtons()
    {
        return $this;
    }

    public function addColumn($key , $value)
    {
        $this->columns[$key] = $value;
        return $this;
    }

    public function prepareColumns()
    {
        return $this;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function addAction($key , $value)
    {
        $this->actions[$key] = $value;
        return $this;
    }

    public function prepareActions()
    {
        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function addStatus($key,$value)      
    {
        $this->status[$key] = $value;
        return $this;
    }

    public function prepareStatus()
    {
        $this->addStatus('1',[
            'method' => 'getStatusUrl',
            'label' => 'Enable',
            'ajax' => true,
            'class' => 'btn btn-success'
        ]);

        $this->addStatus('0',[
            'method' => 'getStatusUrl',
            'label' => 'Disable',
            'ajax' => true,
            'class' => 'btn btn-danger'
        ]);
    }

    public function getMethodUrl($row, $method, $ajax = true)
    {
        return $this->$method($row, $ajax);
    }

    public function getButtonUrl($method, $ajax = true)
    {
        return $this->$method($ajax);
    }

    public function FieldValue($row, $field)
    {
        return $row->$field;
    }

    public function getTitle()
    {
        return "Manage Module";
    }

    public function addFilterButton($key,$value)
    {
        $this->filterButton[$key] = $value;
        return $this;
    }

    public function getFilterButtons()
    {
        return $this->filterBotton;
    }

    public function prepareFilter()
    {
        return $this;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function addFilter($key , $value)
    {
        $this->filters[$key] = $value;
        return $this;
    }

    public function prepareFilterButton()
    {
        return $this;
    }


}

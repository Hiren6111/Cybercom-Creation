<?php
namespace Model\Attribute;
\Mage::loadFileByClassName('Model\Core\Table\Collection');

class Collection extends \Model\Core\Table\Collection
{
   public function __construct()
   {
       \Mage::getModel('Model\Core\Table\Collection');
   }
}

?>

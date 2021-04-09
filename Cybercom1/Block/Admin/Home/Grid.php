<?php
namespace Block\Admin\Home;

class Grid extends \Block\Core\Template
{
	
	function __construct()	
	{
		parent::__construct();
		$this->setTemplate('View/admin/home/grid.php');
	}
}

?>
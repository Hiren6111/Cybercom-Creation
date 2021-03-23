<script src="<?php echo $this->baseUrl("Skin\Admin\Js\jquery-3.5.1.slim.js"); ?>"></script>
<script src="<?php echo $this->baseUrl("Skin/Admin/Js/mage.js"); ?>"></script>
<nav class="navbar navbar-expand-sm bg-dark sticky-top">
    <ul class="navbar-nav font-weight-bold">
        <li class="nav-item" style="width: 8rem;">
        <li>
            <h3 class=" text-white font-weight-bold">Project<h3>
        </li>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="http://localhost/Cybercom1/index.php?c=home&a=home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Admin', null, true) ?>').resetParams().load();">Admin</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Product', null, true) ?>').resetParams().load();">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Category', null, true) ?>').resetParams().load();">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Customer', null, true) ?>').resetParams().load();">Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Attribute', null, true) ?>').resetParams().load();">Attribute</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'CustomerGroup', null, true) ?>').resetParams().load();">Customer Group</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Shipping', null, true) ?>').resetParams().load();">Shipping Method</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'Payment', null, true) ?>').resetParams().load();">Payment Method</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl('grid', 'CmsPage', null, true) ?>').resetParams().load();">Contact Us</a>
        </li>
    </ul>
</nav>
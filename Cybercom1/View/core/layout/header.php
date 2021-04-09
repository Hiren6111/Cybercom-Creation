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
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Admin', null, true) ?>">Admin</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Product', null, true) ?>">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Category', null, true) ?>">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Customer', null, true) ?>">Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Attribute', null, true) ?>">Attribute</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'CustomerGroup', null, true) ?>">Customer Group</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Shipping', null, true) ?>">Shipping Method</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'Payment', null, true) ?>">Payment Method</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('index', 'Cart', null, true) ?>">Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" href="<?php echo $this->getUrl('grid', 'CmsPage', null, true) ?>">Contact Us</a>
        </li>
    </ul>
</nav>
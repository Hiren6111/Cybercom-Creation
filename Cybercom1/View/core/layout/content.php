<?php
$children = $this->getChildren();

foreach ($children as $child){
    echo $child->toHtml();

}

?> 
<!-- <div id="productGrid">

</div>
<script type="text/javascript">
    var object = new Base();
    //object.getParams();
    object.setParams({
        name: 'Hiren',
        email: 'abc@gmail'
    });
    object.setUrl('http://localhost/Cybercom1/index.php?c=product&a=test3');
    object.load();
</script> -->
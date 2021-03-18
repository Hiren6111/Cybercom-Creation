<?php //require_once "header.php";
$cmsPage = $this->getCmsPage();
$option = $cmsPage->getStatusOption();
?>

<div class="container">
    <h2 style="text-align:center ;">CMS Add/Update Form</h2>

    <form method="post" action="<?php echo $this->getUrl('save') ?>">

        <div class="row">
            <div class="col-lg-6">

                <label for="title" class="font-weight-bold">Title</label><br>
                <input type="text" class="form-control" name="cmsPage[title]" value="<?php echo $cmsPage->title; ?>">

                <label for="identifier" class="font-weight-bold">Identifier</label><br>
                <input type="text" class="form-control" name="cmsPage[identifier]" value="<?php echo $cmsPage->identifier; ?>">


            </div>

            <div class="col-lg-6">

                <label for="content" class="font-weight-bold">Content</label><br>
                <input type="text" class="form-control" name="cmsPage[content]" value="<?php echo $cmsPage->content; ?>">

                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="cmsPage[status]">
                    <?php foreach ($option as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php if ($cmsPage->status == $key) {
                                                                echo "selected";
                                                            } ?>><?php echo $value; ?></option>
                    <?php } ?>
                </select><br><br>
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>


            </div>
        </div>

    </form>

</div>
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Index</h3>
                <div class="box-tools">
                    <?php
                    $this->widget('BTombolBox', array(
                        'encodeLabel' => false,
                        'id' => '',
                        'items' => $this->menu,
                    ));
                    ?>
                </div>
            </div>
            <div class="box-body">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->endContent();

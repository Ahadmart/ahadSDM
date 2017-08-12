<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <div class="box <?= $this->box['type'] ?>">
            <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
                <h3 class="box-title"><?= $this->pageHeader['boxTitle'] ?></h3>
                <div class="box-tools">
                    <?php
                    $this->widget('BTombolBox', [
                        'encodeLabel' => false,
                        'id' => '',
                        'items' => $this->menu,
                    ]);
                    ?>
                </div>
            </div>
            <div class="box-body">
                <?= $content; ?>
            </div>
            <?php
            if (!empty($this->footer)):
                ?>
                <div class="box-footer">
                    <?= $this->footer; ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</div>
<?php
$this->endContent();

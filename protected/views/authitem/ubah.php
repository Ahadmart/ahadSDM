<?php
/* @var $this AuthitemController */
/* @var $model AuthItem */

$this->breadcrumbs = [
    'Auth Item' => ['index'],
    $model->name,
];

$this->pageHeader['title'] = 'Ubah';
$this->pageHeader['desc'] = 'Edit Item Otorisasi';

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'] . ' ' . $model->name;
?>
<div class="col-md-6 col-lg-6">
    <div class="box box-primary">
        <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
            <h3 class="box-title">Item Otorisasi: <?= $model->name ?></h3>
        </div>
        <?php $this->renderPartial('_form', ['model' => $model]); ?>
    </div>
</div>

<div class="col-md-6 col-lg-6">
    <div class="box box-success">
        <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
            <h3 class="box-title">Add Child</h3>
        </div>
        <?php
        $this->renderPartial('_child', [
            'model' => $child,
            'id' => $model->name,
            'authItem' => $authItem,
        ]);
        ?>
    </div>
</div>

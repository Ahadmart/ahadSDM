<?php
/* @var $this AlasancutiController */
/* @var $model AlasanCuti */

$this->breadcrumbs=[
	'Alasan Cuti'=>['index'],
	'Index',
];

$this->pageHeader['title'] = 'Alasan Cuti';
$this->pageHeader['desc'] = 'Daftar Alasan Cuti';
$this->pageHeader['boxTitle'] = 'Index';

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'];

?>
<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-6">
        </div>
    </div>
    <div class="row" style="overflow: auto">
        <div class="col-sm-12">
<?php

$this->widget('BGridView', [
	'id'=>'alasan-cuti-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'htmlOptions' => ['style' => 'width: 100%'],
	'columns'=>[
		[
'class' => 'BDataColumn',
'name' => 'id'
],
		[
'class' => 'BDataColumn',
'name' => 'nama'
],
		[
'class' => 'BDataColumn',
'name' => 'updated_at'
],
		[
'class' => 'BDataColumn',
'name' => 'updated_by'
],
		[
'class' => 'BDataColumn',
'name' => 'created_at'
],
		['class'=>'BButtonColumn']
                ]
]);
 ?>
        </div>
    </div>
</div>
<?php
$this->menu = [
    [
        'submenuOptions' => ['class' => 'btn-group visible-sm-block visible-md-block visible-lg-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-plus"></i> <span class="ak">T</span>ambah',
                'url' => $this->createUrl('tambah'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 't'
                ]
            ],
        ],
    ],
    [
        'submenuOptions' => ['class' => 'btn-group visible-xs-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-plus"></i>',
                'url' => $this->createUrl('tambah'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                ]
            ],
        ],
    ]
];


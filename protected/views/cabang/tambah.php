<?php
/* @var $this CabangController */
/* @var $model Cabang */

$this->breadcrumbs=[
	'Cabang'=>['index'],
	'Tambah',
];

$this->pageHeader['title'] = 'Tambah';
$this->pageHeader['desc'] = 'Buat Cabang Baru';
$this->pageHeader['boxTitle'] = 'Input';

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'];

$this->renderPartial('_form', ['model'=>$model]);

$this->menu = [
    [
        'submenuOptions' => ['class' => 'btn-group visible-sm-block visible-md-block visible-lg-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-asterisk"></i> <span class="ak">I</span>ndex',
                'url' => $this->createUrl('index'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'i'
                ]
            ]
        ],
    ],
    [
        'submenuOptions' => ['class' => 'btn-group visible-xs-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-asterisk"></i>',
                'url' => $this->createUrl('index'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                ]
            ]
        ],
    ]
];
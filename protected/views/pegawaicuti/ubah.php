<?php
/* @var $this PegawaicutiController */
/* @var $model PegawaiCuti */

$this->breadcrumbs=[
	'Pegawai Cuti'=>['index'],
	$model->nama=>['view','id'=>$model->id],
	'Ubah',
];

$this->pageHeader['title'] = 'Ubah';
$this->pageHeader['desc'] = 'Edit Pegawai Cuti';
$this->pageHeader['boxTitle'] = 'Pegawai Cuti: '. $model->nama;

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'].' '.$model->nama;

$this->renderPartial('_form', ['model'=>$model]);

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
                'label' => '<i class="fa fa-plus"></i>',
                'url' => $this->createUrl('tambah'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                ]
            ],
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
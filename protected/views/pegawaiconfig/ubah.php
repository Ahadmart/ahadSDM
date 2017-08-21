<?php
/* @var $this PegawaiconfigController */
/* @var $model PegawaiConfig */

$this->breadcrumbs = [
    'Pegawai Config' => ['index'],
    $model->pegawai->nama
];

$this->pageHeader['title'] = 'Ubah';
$this->pageHeader['desc'] = 'Edit Pegawai Config';
//$this->pageHeader['boxTitle'] = 'Pegawai Config: ' . $model->pegawai->nama;

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'] . ' ' . $model->pegawai->nama;
?>
<div class="col-md-6 col-lg-7">
    <div class="box box-primary">
        <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
            <h3 class="box-title">Pegawai Config: <?= $model->pegawai->nama ?></h3>
        </div>
        <?php $this->renderPartial('_form', ['model' => $model]); ?>
    </div>
</div>

<div class="col-md-6 col-lg-5">
    <div class="box box-success">
        <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
            <h3 class="box-title">Update Gaji</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php $this->renderPartial('_form_gaji', ['model' => $pegawaiGaji, 'pegawai' => $model]); ?>
                </div>
            </div>
            <div class="row" style="overflow: auto">
                <div class="col-sm-12">
                    <?php $this->renderPartial('_gaji_grid', ['model' => $gajiGrid, 'pegawai' => $model]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//$this->renderPartial('_form', ['model' => $model]);

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

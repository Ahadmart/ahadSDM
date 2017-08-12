<?php
/* @var $this PegawaiconfigController */
/* @var $model PegawaiConfig */

$this->breadcrumbs = [
    'Pegawai Config' => ['index'],
    'Index',
];

$this->pageHeader['title'] = 'Pegawai Config';
$this->pageHeader['desc'] = 'Daftar Pegawai Config';
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
                'id' => 'pegawai-config-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'htmlOptions' => ['style' => 'width: 100%'],
                'columns' => [
                    [
                        'class' => 'BDataColumn',
                        'name' => 'namaPegawai',
                        'header' => '<span class="ak">N</span>ama',
                        'accesskey' => 'n',
                        'type' => 'raw',
                        'value' => [$this, 'renderLinkToView'],
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'keteranganPegawai',
                        'value' => '$data->getKeteranganPegawai()'
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'bpjs',
                        'value' => '$data->namaBpjs',
                        'filter' => PegawaiConfig::listBpjs()
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'cuti_tahunan',
                        'htmlOptions' => ['class' => 'text-right'],
                        'headerHtmlOptions' => ['class' => 'text-right']
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'tunjangan_anak',
                        'htmlOptions' => ['class' => 'text-right'],
                        'headerHtmlOptions' => ['class' => 'text-right']
                    ],
                    ['class' => 'BButtonColumn']
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


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
            /* /* Agar focus tetap di input cari nama/nip setelah pencarian */
            Yii::app()->clientScript->registerScript('autoFocus', ''
                    . '$( document ).ajaxComplete(function() {'
                    . '$("input[name=\'PegawaiConfig[namaNipPegawai]\'").select();'
                    . '});');

            $this->widget('BGridView', [
                'id' => 'pegawai-config-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'htmlOptions' => ['style' => 'width: 100%'],
                'columns' => [
                    [
                        'class' => 'BDataColumn',
                        'name' => 'namaNipPegawai',
                        'header' => '<span class="ak">N</span>ama / NIP',
                        'accesskey' => 'n',
                        'type' => 'raw',
                        'value' => [$this, 'renderLinkToUbah'],
                        'autoFocus' => true
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
                        'headerHtmlOptions' => ['class' => 'text-right'],
                        'filter' => false
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'tunjangan_anak',
                        'value' => 'number_format($data->tunjangan_anak, 2, ",", ".")',
                        'htmlOptions' => ['class' => 'text-right'],
                        'headerHtmlOptions' => ['class' => 'text-right'],
                        'filter' => false
                    ],
                    [
                        'class' => 'BDataColumn',
                        'header' => 'Gaji',
                        'name' => 'gajiTerkini',
                        'value' => '$data->gajiTerakhir',
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


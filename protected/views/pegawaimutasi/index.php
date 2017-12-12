<?php
/* @var $this PegawaimutasiController */
/* @var $model PegawaiMutasi */

$this->breadcrumbs = [
    'Mutasi Pegawai' => ['index'],
    'Index',
];

$this->pageHeader['title'] = 'Mutasi Pegawai';
$this->pageHeader['desc'] = 'Daftar Mutasi Pegawai';
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
            /*  Agar focus tetap di input cari nama/nip setelah pencarian */
            Yii::app()->clientScript->registerScript('autoFocus', ''
                    . '$( document ).ajaxComplete(function() {'
                    . '$("input[name=\'PegawaiMutasi[namaNipPegawai]\'").select();'
                    . '});');

            $this->widget('BGridView', [
                'id' => 'pegawai-mutasi-grid',
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
                        'value' => [$this, 'renderLinkToView'],
                        'autoFocus' => true
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'keteranganPegawai',
                        'value' => '$data->getKeteranganPegawai()'
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'per_tanggal'
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'keterangan'
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


<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs = [
    'Pegawai' => ['index'],
    'Index',
];

$this->pageHeader['title'] = 'Pegawai';
$this->pageHeader['desc'] = 'Daftar Pegawai';
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
                    . '$("input[name=\'Pegawai[namaNipPegawai]\'").select();'
                    . '});');

            $this->widget('BGridView', [
                'id' => 'pegawai-grid',
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
                        'name' => 'alamat'
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'tanggal_lahir'
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'cabang_id',
                        'value' => '$data->cabang->nama',
                        'filter' => Cabang::getList()
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'bagian_id',
                        'value' => '$data->bagian->nama',
                        'filter' => Bagian::getList()
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'jabatan_id',
                        'value' => '$data->jabatan->nama',
                        'filter' => Jabatan::getList()
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'telpon'
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'perusahaan'
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


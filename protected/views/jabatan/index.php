<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs = [
    'Jabatan' => ['index'],
    'Index',
];

$this->pageHeader['title'] = 'Jabatan';
$this->pageHeader['desc'] = 'Daftar Jabatan';
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
                'id' => 'jabatan-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'htmlOptions' => ['style' => 'width: 100%'],
                'columns' => [
                    [
                        'class' => 'BDataColumn',
                        'name' => 'nama',
                        'header' => '<span class="ak">N</span>ama',
                        'accesskey' => 'n',
                        'type' => 'raw',
                        'value' => [$this, 'renderLinkToView'],
                        'autoFocus' => true
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


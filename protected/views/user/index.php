<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = [
    'User' => ['index'],
    'Index',
];

$this->pageHeader['title'] = 'User';
$this->pageHeader['desc'] = 'Daftar Pengguna';
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
                'id' => 'user-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => [
                    [
                        'class' => 'BDataColumn',
                        'name' => 'nama',
                        'header' => '<span class="ak">N</span>ama',
                        'accesskey' => 'n',
                        'type' => 'raw',
                        'value' => [$this, 'renderLinkToView']
                    ],
                    [
                        'class' => 'BDataColumn',
                        'name' => 'nama_lengkap',
                    ],
                    [
                        'class' => 'BButtonColumn',
                    ],
                ],
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

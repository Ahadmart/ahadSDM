<?php
/* @var $this KategoribarangController */
/* @var $model KategoriBarang */

$this->breadcrumbs = [
    'User' => ['index'],
    $model->nama,
];

$this->pageHeader['title'] = 'View';
$this->pageHeader['desc'] = 'User Detail';
$this->pageHeader['boxTitle'] = 'User: ' . $model->nama;

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'];
?>
<div class="row">
    <div class="col-sm-12">
        <?php
        $this->widget('BDetailView', [
            'data' => $model,
            'attributes' => [
                'nama',
                'nama_lengkap'
            ],
        ]);
        ?>
    </div>
</div>
<?php
$this->menu = [
    [
        'submenuOptions' => ['class' => 'btn-group visible-sm-block visible-md-block visible-lg-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-pencil"></i> <span class="ak">U</span>bah',
                'url' => $this->createUrl('ubah', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'u'
                ]
            ],
            [
                'label' => '<i class="fa fa-times"></i> <span class="ak">H</span>apus',
                'url' => $this->createUrl('hapus', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'h',
                    'submit' => ['hapus', 'id' => $model->id],
                    'confirm' => 'Anda yakin?'
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
                'label' => '<i class="fa fa-pencil"></i>',
                'url' => $this->createUrl('ubah', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                ]
            ],
            [
                'label' => '<i class="fa fa-times"></i>',
                'url' => $this->createUrl('hapus', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                    'submit' => ['hapus', 'id' => $model->id],
                    'confirm' => 'Anda yakin?'
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

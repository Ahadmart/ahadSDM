<?php
$this->pageHeader['title'] = 'Tambah';
$this->pageHeader['desc'] = 'Tambah Item Otorisasi';

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'];

$tombolAutoGen = [
    [
        'submenuOptions' => ['class' => 'btn-group visible-sm-block visible-md-block visible-lg-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-refresh"></i> <span class="ak">R</span>efresh',
                'url' => $this->createUrl('gensim'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-info tombol-gensim',
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
                'label' => '<i class="fa fa-refresh"></i>',
                'url' => $this->createUrl('gensim'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-info tombol-gensim',
                ]
            ]
        ],
    ]
];
?>
<div class="col-md-6 col-lg-6">
    <div class="box box-primary">
        <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
            <h3 class="box-title">Input</h3>
        </div>
        <?php $this->renderPartial('_form', ['model' => $model]); ?>
    </div>
</div>

<div class="col-md-6 col-lg-6">
    <div class="box box-success">
        <div class="box-header <?= $this->box['headerBorder'] ? 'with-border' : '' ?>">
            <h3 class="box-title">Auto Generate Operation(s)</h3>
            <div class="box-tools">
                <?php
                $this->widget('BTombolBox', [
                    'encodeLabel' => false,
                    'id' => '',
                    'items' => $tombolAutoGen,
                ]);
                ?>
            </div>
        </div>
        <?php
        $this->renderPartial('_autogen', ['model' => $model]);
        ?>
    </div>
</div>
<script>
    $(".tombol-gensim").click(function () {
        $.ajax({
            url: '<?= $this->createUrl('gensim'); ?>',
            success: function (data) {
                if (data.sukses) {
                    $("#gensim-container").html("<h1>Sukses</h1>");
                    var sudahAda = 0;
                    var belumAda = 0;
                    $("#gensim-container").append(data.message);
//                    $.each(data.actions, function (index, value) {
//                        $("#gensim-container").append(value.nama + " - " + value.ada + "<br />");
//                        if (value.ada) {
//                            sudahAda++;
//                        } else {
//                            belumAda++;
//                        }
//                    });
//                    $("#gensim-container").append('Item yang sudah ada: ' + sudahAda + '<br />');
//                    $("#gensim-container").append('Item yang belum ada: ' + belumAda + '<br />');
                } else {
                    $("#gensim-container").html("<h1>Else</h1>");
                }
            }
        });
        return false;
    });
</script>
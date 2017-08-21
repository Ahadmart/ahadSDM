<?php

$this->widget('BGridView', [
    'id' => 'pegawai-gaji-grid',
    'dataProvider' => $model->search(),
    'htmlOptions' => ['style' => 'width: 100%'],
    'columns' => [
        [
            'class' => 'BDataColumn',
            'name' => 'per_tanggal'
        ],
        [
            'class' => 'BDataColumn',
            'name' => 'gaji',
            'value' => 'number_format($data->gaji, 2, ",", ".")'
        ],
    ]
]);

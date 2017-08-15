<?php

$this->widget('BGridView', [
    'id' => 'auth-assigned-grid',
    'dataProvider' => $model->search(),
//	 'filter' => $model,
    'columns' => [
        'itemname',
        [
            'header' => '',
            'value' => function($data) {
                return '<span class="label label-default">' . $data->authTypeName . '</span>';
            },
            'type' => 'raw'
        ],
        [
            'class' => 'BButtonColumn',
            'headerHtmlOptions' => ['style' => 'width:50px'],
            'deleteButtonUrl' => 'Yii::app()->createUrl(\'' . $this->id . '/revoke\', array(\'userid\'=>\'' . $user->id . '\',\'item\'=>$data->itemname))',
            'deleteButtonLabel' => '<i class="fa fa-eject"></i>',
            'deleteButtonOptions' => ['title' => 'Revoke'],
            'afterDelete' => 'function(link,success,data){ if(success) updateItemOpt(); }',
        ],
    ],
]);

//eof
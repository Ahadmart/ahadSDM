
<div class="box-body">
    <div class="input-group">
        <select class="form-control" id="select-child">
            <?php
            // render _child_opt ;
            $this->renderPartial('_authitem_opt', [
                'authItem' => $authItem
            ]);
            ?>
        </select>
        <span class="input-group-btn">
            <a href="#" id="tombol-assign" class="btn btn-info btn-flat">Assign</a>
        </span>
    </div>

    <script>
        $("#tombol-assign").click(function () {
            console.log(jQuery("#select-child").val());
            dataString = 'child=' + jQuery("#select-child").val();
            $.fn.yiiGridView.update('auth-child-grid', {
                type: 'POST',
                data: dataString,
                url: "<?php echo $this->createUrl('assign', ['nama' => $id]); ?>",
                success: function () {
                    $.fn.yiiGridView.update('auth-child-grid');
                    updateChildOpt();
                }
            });
            return false;
        });
        function updateChildOpt() {
            $("#select-child").load("<?php echo $this->createUrl('listauthitem', ['nama' => $id]); ?>");
        }
    </script>
    <?php
    $this->widget('BGridView', [
        'id' => 'auth-child-grid',
        'dataProvider' => $model->search(),
        'htmlOptions' => ['style' => 'width: 100%'],
        'columns' => [
            [
                'class' => 'BDataColumn',
                'name' => 'child',
                'type' => 'raw',
                'value' =>
                function($data) {
                    return '<a href="' . Yii::app()->controller->createUrl('ubah', ['nama' => $data->child]) . '">' . $data->child . '</a>';
                }
            ],
            [
                'header' => '',
                'value' => function($data) {
                    return '<span class="label">' . $data->child0->authTypeName . '</span>';
                },
                'type' => 'raw'
            ],
            [
                'class' => 'BButtonColumn',
                'deleteButtonUrl' => 'Yii::app()->createUrl(\'' . $this->id . '/remove\', [\'nama\'=>\'' . $id . '\', \'child\' => $data->child0->name])',
                'afterDelete' => 'function(link,success,data){ if(success) updateChildOpt(); }',
            ],
        ],
    ]);
    ?>
</div>
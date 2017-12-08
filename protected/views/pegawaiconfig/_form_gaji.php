<?php
/* @var $this PegawaiGajiController */
/* @var $model PegawaiGaji */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', CClientScript::POS_HEAD);
?>

<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'pegawai-gaji-_form_gaji-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation' => false,
    'htmlOptions' => ['class' => 'form-horizontal']
        ]);
?>

<?php echo $form->errorSummary($model, 'Error: Perbaiki input', null, ['class' => 'callout callout-danger']); ?>
<?php echo $form->hiddenField($model, 'pegawai_id', ['value' => $pegawai->pegawai_id]); ?>
<div class = "form-group">
    <?php echo $form->labelEx($model, 'per_tanggal', ['class' => 'col-sm-3 control-label']);
    ?>
    <div class="col-sm-9">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <?php echo $form->textField($model, 'per_tanggal', ['class' => 'form-control', 'value' => $model->isNewRecord ? date('d-m-Y') : $model->per_tanggal]); ?>
            <?php echo $form->error($model, 'per_tanggal', ['class' => 'bg-red']); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'gaji', ['class' => 'col-sm-3 control-label']); ?>
    <div class="col-sm-9">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-money"></i>
            </div>
            <?php echo $form->textField($model, 'gaji', ['class' => 'form-control', 'size' => 18, 'maxlength' => 18]); ?>
            <?php echo $form->error($model, 'gaji', ['class' => 'bg-red']); ?>
        </div>
    </div>
</div>
<?php
echo CHtml::ajaxSubmitButton('Update', $this->createUrl('updategaji', ['id' => $pegawai->id]), [
    'success' => "function () {
                                $.fn.yiiGridView.update('pegawai-gaji-grid');
                            }"
        ], [
    'class' => 'btn btn-info pull-right',
    'id' => 'tombol-update-gaji']);
?>

<script>
    $('#PegawaiGaji_per_tanggal').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>

<?php
$this->endWidget();

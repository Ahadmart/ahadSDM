<?php
/* @var $this PegawaicutiController */
/* @var $model PegawaiCuti */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', CClientScript::POS_HEAD);
?>

<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'pegawai-cuti-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => ['class' => 'form-horizontal']
        ]);
?>

<div class="box-body">

    <?php echo $form->errorSummary($model, 'Error: Perbaiki input', null, ['class' => 'callout callout-danger']); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'pegawai_id', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'pegawai_id', Pegawai::getListPanjang(), ['class' => 'form-control', 'prompt' => 'Pilih satu..', 'autofocus' => 'autofocus']); ?>
            <?php echo $form->error($model, 'pegawai_id', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'cuti', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'cuti', ['class' => 'form-control', 'size' => 4, 'maxlength' => 4]); ?>
            <?php echo $form->error($model, 'cuti', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'mulai_cuti', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <?php echo $form->textField($model, 'mulai_cuti', ['class' => 'form-control', 'value' => $model->isNewRecord ? date('d-m-Y') : $model->mulai_cuti]); ?>
                <?php echo $form->error($model, 'mulai_cuti', ['class' => 'bg-red']); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'alasan_cuti_id', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'alasan_cuti_id', AlasanCuti::getList(), ['class' => 'form-control']); ?>
            <?php echo $form->error($model, 'alasan_cuti_id', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'keterangan', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'keterangan', ['class' => 'form-control', 'size' => 60, 'maxlength' => 250]); ?>
            <?php echo $form->error($model, 'keterangan', ['class' => 'bg-red']); ?>
        </div>
    </div>

</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', ['class' => 'btn btn-info pull-right']); ?>
</div>

<?php
$this->endWidget();
?>

<script>
    $('#PegawaiCuti_mulai_cuti').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    })
</script>

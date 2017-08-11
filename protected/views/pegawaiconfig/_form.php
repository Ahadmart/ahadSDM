<?php
/* @var $this PegawaiconfigController */
/* @var $model PegawaiConfig */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'pegawai-config-form',
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
        <?php echo $form->labelEx($model, 'cuti_tahunan', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'cuti_tahunan', ['class' => 'form-control', 'size' => 4, 'maxlength' => 4]); ?>
            <?php echo $form->error($model, 'cuti_tahunan', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'bpjs', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'bpjs', PegawaiConfig::listBpjs(), ['class' => 'form-control']); ?>
            <?php echo $form->error($model, 'bpjs', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'tunjangan_anak', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'tunjangan_anak', ['class' => 'form-control', 'size' => 18, 'maxlength' => 18]); ?>
            <?php echo $form->error($model, 'tunjangan_anak', ['class' => 'bg-red']); ?>
        </div>
    </div>

</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', ['class' => 'btn btn-info pull-right']); ?>
</div>

<?php
$this->endWidget();

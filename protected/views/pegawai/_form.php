<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', CClientScript::POS_HEAD);
?>

<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'pegawai-form',
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
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'nip', ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model, 'nip', ['class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'autofocus' => 'autofocus']); ?>
                    <?php echo $form->error($model, 'nip', ['class' => 'bg-red']); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'nama', ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model, 'nama', ['class' => 'form-control', 'size' => 50, 'maxlength' => 50]); ?>
                    <?php echo $form->error($model, 'nama', ['class' => 'bg-red']); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'alamat', ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model, 'alamat', ['class' => 'form-control', 'size' => 60, 'maxlength' => 250]); ?>
                    <?php echo $form->error($model, 'alamat', ['class' => 'bg-red']); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'tanggal_lahir', ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <?php echo $form->textField($model, 'tanggal_lahir', ['class' => 'form-control']); ?>
                        <?php echo $form->error($model, 'tanggal_lahir', ['class' => 'bg-red']); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'telpon', ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model, 'telpon', ['class' => 'form-control', 'size' => 50, 'maxlength' => 50]); ?>
                    <?php echo $form->error($model, 'telpon', ['class' => 'bg-red']); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'perusahaan', ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model, 'perusahaan', ['class' => 'form-control', 'size' => 50, 'maxlength' => 50]); ?>
                    <?php echo $form->error($model, 'perusahaan', ['class' => 'bg-red']); ?>
                </div>
            </div>
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
    $('#Pegawai_tanggal_lahir').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    })
</script>
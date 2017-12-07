<?php
/* @var $this PegawaimutasiController */
/* @var $model PegawaiMutasi */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', CClientScript::POS_HEAD);
?>

<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'pegawai-mutasi-form',
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
            <?php echo $form->dropDownList($model, 'pegawai_id', /*Pegawai::getListPanjang()*/[], ['class' => 'form-control', 'prompt' => 'Pilih satu..', 'autofocus' => 'autofocus']); ?>
            <?php echo $form->error($model, 'pegawai_id', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'cabang_id', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'cabang_id', Cabang::getList(), ['class' => 'form-control', 'prompt' => 'Pilih satu..']); ?>
            <?php echo $form->error($model, 'cabang_id', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'bagian_id', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'bagian_id', Bagian::getList(), ['class' => 'form-control', 'prompt' => 'Pilih satu..']); ?>
            <?php echo $form->error($model, 'bagian_id', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'jabatan_id', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'jabatan_id', Jabatan::getList(), ['class' => 'form-control', 'prompt' => 'Pilih satu..']); ?>
            <?php echo $form->error($model, 'jabatan_id', ['class' => 'bg-red']); ?>
        </div>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'per_tanggal', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
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
        <?php echo $form->labelEx($model, 'keterangan', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'keterangan', ['class' => 'form-control', 'size' => 60, 'maxlength' => 1000]); ?>
            <?php echo $form->error($model, 'keterangan', ['class' => 'bg-red']); ?>
        </div>
    </div>

</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', ['class' => 'btn btn-info pull-right']); ?>
</div>

<script>
    $('#PegawaiMutasi_per_tanggal').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    })
</script>

<?php
$this->endWidget();


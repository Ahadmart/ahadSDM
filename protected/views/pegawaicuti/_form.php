<?php
/* @var $this PegawaicutiController */
/* @var $model PegawaiCuti */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', [
	'id'=>'pegawai-cuti-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => ['class' => 'form-horizontal']
]); ?>

<div class="box-body">

	<?php echo $form->errorSummary($model,'Error: Perbaiki input',null,['class'=>'callout callout-danger']); ?>

    <div class="form-group">
		<?php echo $form->labelEx($model,'pegawai_id', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'pegawai_id',['class'=>'form-control', 'size'=>10,'maxlength'=>10]); ?>
		<?php echo $form->error($model,'pegawai_id', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'nama', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'nama',['class'=>'form-control', 'size'=>50,'maxlength'=>50]); ?>
		<?php echo $form->error($model,'nama', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'cuti', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'cuti',['class'=>'form-control', 'size'=>4,'maxlength'=>4]); ?>
		<?php echo $form->error($model,'cuti', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'mulai_cuti', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'mulai_cuti', ['class'=>'form-control']); ?>
		<?php echo $form->error($model,'mulai_cuti', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'alasan_cuti_id', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'alasan_cuti_id',['class'=>'form-control', 'size'=>10,'maxlength'=>10]); ?>
		<?php echo $form->error($model,'alasan_cuti_id', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'keterangan', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'keterangan',['class'=>'form-control', 'size'=>60,'maxlength'=>250]); ?>
		<?php echo $form->error($model,'keterangan', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'updated_at', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'updated_at', ['class'=>'form-control']); ?>
		<?php echo $form->error($model,'updated_at', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'updated_by', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'updated_by',['class'=>'form-control', 'size'=>10,'maxlength'=>10]); ?>
		<?php echo $form->error($model,'updated_by', ['class'=>'bg-red']); ?>
		</div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'created_at', ['class'=>'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
		<?php echo $form->textField($model,'created_at', ['class'=>'form-control']); ?>
		<?php echo $form->error($model,'created_at', ['class'=>'bg-red']); ?>
		</div>
	</div>

</div>
<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', ['class' => 'btn btn-info pull-right']); ?>
</div>

<?php $this->endWidget();

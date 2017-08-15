<?php
/* @var $this AuthitemController */
/* @var $model AuthItem */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'auth-item-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => ['class' => 'form-horizontal']
        ]);
?>

<div class="box-body">
    <?php echo $form->errorSummary($model, 'Error: Perbaiki input', null, ['class' => 'panel callout']); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'type', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'type', AuthItem::getList(), ['class' => 'form-control', 'prompt' => 'Pilih satu..', 'autofocus' => 'autofocus']); ?>
            <?php echo $form->error($model, 'type', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'name', ['class' => 'form-control', 'size' => 60, 'maxlength' => 60]); ?>
            <?php echo $form->error($model, 'name', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'description', ['class' => 'form-control', 'rows' => 6, 'cols' => 50]); ?>
            <?php echo $form->error($model, 'description', ['class' => 'bg-red']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'bizrule', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'bizrule', ['class' => 'form-control', 'rows' => 6, 'cols' => 50]); ?>
            <?php echo $form->error($model, 'bizrule', ['class' => 'bg-red']); ?>
        </div>
    </div>

</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', ['class' => 'btn btn-info pull-right']); ?>
</div>

<?php
$this->endWidget();

<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'user-form',
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
        <?php echo $form->labelEx($model, 'nama', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'nama', ['class' => 'form-control', 'size' => 45, 'maxlength' => 45, 'autofocus' => 'autofocus']); ?>
            <?php echo $form->error($model, 'nama', ['class' => 'error']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'nama_lengkap', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'nama_lengkap', ['class' => 'form-control', 'size' => 60, 'maxlength' => 100]); ?>
            <?php echo $form->error($model, 'nama_lengkap', ['class' => 'error']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'newPassword', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->passwordField($model, 'newPassword', ['class' => 'form-control', 'size' => 60, 'maxlength' => 512]); ?>
            <?php echo $form->error($model, 'newPassword', ['class' => 'error']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'newPasswordRepeat', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->passwordField($model, 'newPasswordRepeat', ['class' => 'form-control', 'size' => 60, 'maxlength' => 512]); ?>
            <?php echo $form->error($model, 'newPasswordRepeat', ['class' => 'error']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'theme_id', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'theme_id', Theme::model()->listTheme(), ['class' => 'form-control']); ?>
            <?php echo $form->error($model, 'theme_id', ['class' => 'error']); ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', ['class' => 'btn btn-info pull-right']); ?>
</div>

<?php
$this->endWidget();

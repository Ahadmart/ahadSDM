<?php
/* @var $this AuthitemController */
/* @var $model AuthItem */
/* @var $form CActiveForm */
?>


<div class="box-body">
    <div id="gensim-container">

    </div>
</div>
<div class="box-footer">
    <?php //echo CHtml::submitButton('Execute!', ['class' => 'btn btn-warning pull-right tombol-exec', 'style' => 'display:none']); ?>
    <?= CHtml::link('Execute!', $this->createUrl('genexec'), ['class' => 'btn btn-warning pull-right tombol-exec', 'style' => 'display:none']) ?>
</div>

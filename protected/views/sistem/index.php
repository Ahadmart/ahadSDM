<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$this->pageHeader['title'] = 'Ahad SDM';
$this->pageHeader['desc'] = 'Aplikasi Web SDM';

$this->breadcrumbs = array(
    'Welcome'
);
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

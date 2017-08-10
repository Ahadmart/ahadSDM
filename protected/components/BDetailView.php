<?php

Yii::import('zii.widgets.CDetailView');

class BDetailView extends CDetailView
{

    public $cssFile = false;
    public $htmlOptions = array('class' => 'table table-striped table-bordered');
    public $itemTemplate = "<tr class=\"{class}\"><th class=\"text-right\">{label}</th><td>{value}</td></tr>\n";

}

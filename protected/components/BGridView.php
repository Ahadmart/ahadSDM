<?php

Yii::import('zii.widgets.grid.CGridView');

class BGridView extends CGridView
{

    public $htmlOptions = ['class' => ''];
    public $template = "<div class='row'><div class='col-sm-12'>{items}</div></div>\n<div class='row'><div class='col-sm-5'>{summary}</div><div class='col-sm-7'>{pager}</div></div>";
    public $emptyText = 'Data tidak ditemukan';
    public $summaryText = '{start}-{end} dari {count}';
    public $summaryCssClass = 'dataTables_info';
    public $itemsCssClass = 'table table-bordered table-striped dataTable';
    public $pagerCssClass = 'pagination-centered';
    public $loadingCssClass = 'grid-loading';
    public $pager = [
        'header' => '',
        'firstPageCssClass' => 'arrow',
        'firstPageLabel' => '&laquo;',
        'prevPageLabel' => '&lsaquo;',
        'nextPageLabel' => '&rsaquo;',
        'htmlOptions' => ['class' => 'pagination'],
        'hiddenPageCssClass' => 'unavailable',
        'selectedPageCssClass' => 'current',
        'lastPageCssClass' => 'arrow',
        'lastPageLabel' => '&raquo;',
    ];
    public $parentModelId = null;

    /**
     * Initializes the grid view.
     * This method will initialize required property values and instantiate {@link columns} objects.
     */
    public function init()
    {
        parent::init();
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
    }

}

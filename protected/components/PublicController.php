<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class PublicController extends BaseController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    //public $layout = '//layouts/polos';

    protected function beforeAction($action)
    {
        $theme = $this->getTheme();
        Yii::app()->theme = is_null($theme) ? 'adminlte' : $theme;
        return parent::beforeAction($action);
    }

}

<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends BaseController
{

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/box';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return [
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        ];
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return [
            ['deny', // deny guest
                'users' => ['guest'],
            ],
        ];
    }

    protected function beforeAction($action)
    {
        $theme = $this->getTheme();
        Yii::app()->theme = is_null($theme) ? 'default_dark' : $theme;

        $superUser = Yii::app()->authManager->getAuthAssignment(Yii::app()->params['superuser'], Yii::app()->user->id) === null ? FALSE : TRUE;
        if ($superUser) {
            return true;
        } else {
            if (Yii::app()->user->checkAccess(Yii::app()->controller->id . '.' . Yii::app()->controller->action->id)) {
                return true;
            } else {
                throw new CHttpException(403, 'Akses ditolak - Anda tidak memiliki izin untuk mengakses halaman ini!');
            }
        }
    }

}

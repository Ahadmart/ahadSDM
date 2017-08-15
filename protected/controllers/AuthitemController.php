<?php

class AuthitemController extends Controller
{

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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', [
            'model' => $this->loadModel($id),
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionTambah()
    {
        $this->layout = '//layouts/box_form_medium';
        $model = new AuthItem;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['AuthItem'])) {
            $authItem = $_POST['AuthItem'];
            $auth = Yii::app()->authManager;
            switch ($authItem['type']) {
                case 0:
                    $auth->createOperation($authItem['name'], $authItem['description'], $authItem['bizrule']);
                    break;
                case 1:
                    $auth->createTask($authItem['name'], $authItem['description'], $authItem['bizrule']);
                    break;
                case 2:
                    $auth->createRole($authItem['name'], $authItem['description'], $authItem['bizrule']);
                    break;
            }
            $this->redirect(['ubah', 'nama' => $authItem['name']]);
        }

        $this->render('tambah', [
            'model' => $model,
        ]);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUbah($nama)
    {
        $this->layout = '//layouts/nobox';

        $model = $this->loadModel($nama);

        $child = new AuthItemChild('search');
        $child->unsetAttributes();
        $child->setAttribute('parent', '=' . $nama);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['AuthItem'])) {
            $model->attributes = $_POST['AuthItem'];
            if ($model->save()) {
                $this->redirect('index');
            }
        }

        $this->render('ubah', [
            'model' => $model,
            'child' => $child,
            'authItem' => $this->_listAuthItem($nama),
        ]);
    }

    public function actionListAuthItem($nama)
    {
        $this->renderPartial('_authitem_opt', [
            'authItem' => $this->_listAuthItem($nama)
        ]);
    }

    public function _listAuthItem($id)
    {
        $authItem = [];
        $authItem['role'] = AuthItem::model()->listAuthItem(2, $id);
        $authItem['task'] = AuthItem::model()->listAuthItem(1, $id);
        $authItem['operation'] = AuthItem::model()->listAuthItem(0, $id);
        return $authItem;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param string $nama the ID of the model to be deleted
     */
    public function actionHapus($nama)
    {
        $this->loadModel($nama)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['index']);
    }

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new AuthItem('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['AuthItem']))
            $model->attributes = $_GET['AuthItem'];

        $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AuthItem the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = AuthItem::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AuthItem $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'auth-item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Assign a Child
     */
    public function actionAssign($nama)
    {
        if (isset($_GET['ajax']) && $_GET['ajax'] === 'auth-child-grid' && isset($_POST['child'])) {
            $child = $_POST['child'];
            $auth = Yii::app()->authManager;
            $auth->addItemChild($nama, $child);
            echo 'Assign Child Status: OK';
        }
    }

    /*
     * Revoke a child
     */

    public function actionRemove($nama, $child)
    {
        echo $nama, '--', $child . '. ';
        if (isset($_GET['ajax']) && $_GET['ajax'] === 'auth-child-grid') {
            $auth = Yii::app()->authManager;
            $auth->removeItemChild($nama, $child);
            echo 'Remove Child Status: OK';
        }
    }

    public function renderLinkToUbah($data)
    {
        return '<a href="' .
                $this->createUrl('ubah', ['nama' => $data->name]) . '">' .
                $data->name . '</a>';
    }

}

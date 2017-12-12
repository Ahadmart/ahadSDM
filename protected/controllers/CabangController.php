<?php

class CabangController extends Controller
{

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->layout = '//layouts/box_medium';
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

        $model = new Cabang;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cabang'])) {
            $model->attributes = $_POST['Cabang'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $this->render('tambah', [
            'model' => $model,
        ]);
    }

    /**
     * Updates a particular model.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUbah($id)
    {
        $this->layout = '//layouts/box_form_medium';

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cabang'])) {
            $model->attributes = $_POST['Cabang'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $id]);
            }
        }

        $this->render('ubah', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionHapus($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['index']);
    }

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new Cabang('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cabang'])) {
            $model->attributes = $_GET['Cabang'];
        }

        $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cabang the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Cabang::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cabang $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cabang-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function renderLinkToView($data)
    {
        $return = '';
        if (isset($data->nama)) {
            $return = '<a href="' .
                    $this->createUrl('view', ['id' => $data->id]) . '">' .
                    $data->nama . '</a>';
        }
        return $return;
    }

}

<?php

class PegawaicutiController extends Controller
{

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id, $flashmsg = '')
    {
        $this->layout = '//layouts/box_medium';

        $this->render('view', [
            'model' => $this->loadModel($id),
            'flashmsg' => $flashmsg
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionTambah()
    {
        $this->layout = '//layouts/box_form';

        $model = new PegawaiCuti;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PegawaiCuti'])) {
            $model->attributes = $_POST['PegawaiCuti'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $model->id, 'flashmsg' => 'Cuti berhasil diproses']);
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
        $this->layout = '//layouts/box_form';

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PegawaiCuti'])) {
            $model->attributes = $_POST['PegawaiCuti'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $id, 'flashmsg' => 'Data cuti berhasil diperbaharui']);
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
        $model = new PegawaiCuti('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PegawaiCuti'])) {
            $model->attributes = $_GET['PegawaiCuti'];
        }

        $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PegawaiCuti the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = PegawaiCuti::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PegawaiCuti $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pegawai-cuti-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function renderLinkToView($data)
    {
        $return = '';
        if (isset($data->pegawai)) {
            $return = '<a href="' .
                    $this->createUrl('view', ['id' => $data->id]) . '">' .
                    $data->pegawai->nama . ' / ' . $data->pegawai->nip . '</a>';
        }
        return $return;
    }

    public function renderLinkToUbah($data)
    {
        $return = '';
        if (isset($data->pegawai)) {
            $return = '<a href="' .
                    $this->createUrl('view', ['id' => $data->id]) . '">' .
                    $data->pegawai->nama . ' / ' . $data->pegawai->nip . '</a>';
        }
        return $return;
    }

}

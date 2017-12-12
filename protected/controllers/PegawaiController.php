<?php

class PegawaiController extends Controller
{

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->layout = '//layouts/nobox';
        
        $daftarMutasi = new PegawaiMutasi('search');
        $daftarMutasi->unsetAttributes();  // clear any default values
        $daftarMutasi->pegawai_id = $id;
        
        $this->render('view', [
            'model' => $this->loadModel($id),
            'sudahPernahMutasi' => PegawaiMutasi::sudahPernah($id),
            'daftarMutasi' => $daftarMutasi
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionTambah()
    {
        $this->layout = '//layouts/box_form_medium';

        $model = new Pegawai;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pegawai'])) {
            $model->attributes = $_POST['Pegawai'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $this->render('tambah', [
            'model' => $model,
            'sudahPernahMutasi' => false
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

        if (isset($_POST['Pegawai'])) {
            $model->attributes = $_POST['Pegawai'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $id]);
            }
        }

        $this->render('ubah', [
            'model' => $model,
            'sudahPernahMutasi' => PegawaiMutasi::sudahPernah($id)
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
        $model = new Pegawai('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pegawai'])) {
            $model->attributes = $_GET['Pegawai'];
        }

        $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pegawai the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Pegawai::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pegawai $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pegawai-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function renderLinkToView($data)
    {
        return '<a href="' .
                $this->createUrl('view', ['id' => $data->id]) . '">' .
                $data->nama . ' / ' . $data->nip . '</a>';
    }

}

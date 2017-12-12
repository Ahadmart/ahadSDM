<?php

class PegawaiconfigController extends Controller
{

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
        $this->layout = '//layouts/box_form';

        $model = new PegawaiConfig;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PegawaiConfig'])) {
            $model->attributes = $_POST['PegawaiConfig'];
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
        $this->layout = '//layouts/nobox';

        $model = $this->loadModel($id);
        $pegawaiGaji = new PegawaiGaji;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PegawaiConfig'])) {
            $model->attributes = $_POST['PegawaiConfig'];
            if ($model->save()) {
                $this->redirect(['index']);
            }
        }

        $gajiGrid = new PegawaiGaji('search');
        $gajiGrid->unsetAttributes();
        $gajiGrid->pegawai_id = $model->pegawai_id;

        $this->render('ubah', [
            'model' => $model,
            'pegawaiGaji' => $pegawaiGaji,
            'gajiGrid' => $gajiGrid
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
        $model = new PegawaiConfig('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PegawaiConfig'])) {
            $model->attributes = $_GET['PegawaiConfig'];
        }

        $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PegawaiConfig the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = PegawaiConfig::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PegawaiConfig $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pegawai-config-form') {
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
                    $this->createUrl('ubah', ['id' => $data->id]) . '">' .
                    $data->pegawai->nama . ' / ' . $data->pegawai->nip . '</a>';
        }
        return $return;
    }

    public function actionUpdateGaji($id)
    {

        $model = new PegawaiGaji;

        if (isset($_POST['PegawaiGaji'])) {
            $model->attributes = $_POST['PegawaiGaji'];
            if ($model->save()) {
                $this->renderJSON(['sukses' => true]);
            }
        }
        $this->renderJSON(['sukses' => false]);
    }

}

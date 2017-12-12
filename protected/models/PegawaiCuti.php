<?php

/**
 * This is the model class for table "pegawai_cuti".
 *
 * The followings are the available columns in table 'pegawai_cuti':
 * @property string $id
 * @property string $pegawai_id
 * @property string $nama
 * @property string $cuti
 * @property string $mulai_cuti
 * @property string $alasan_cuti_id
 * @property string $keterangan
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property AlasanCuti $alasanCuti
 * @property Pegawai $pegawai
 * @property User $updatedBy
 */
class PegawaiCuti extends CActiveRecord
{

    public $namaNipPegawai;
    public $keteranganPegawai;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pegawai_cuti';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pegawai_id, nama, cuti, mulai_cuti, alasan_cuti_id', 'required', 'message' => '[{attribute}] harus diisi!'),
            array('pegawai_id, alasan_cuti_id, updated_by', 'length', 'max' => 10),
            array('nama', 'length', 'max' => 50),
            array('cuti', 'length', 'max' => 4),
            array('keterangan', 'length', 'max' => 250),
            array('created_at, updated_at, updated_by', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, pegawai_id, nama, cuti, mulai_cuti, alasan_cuti_id, keterangan, updated_at, updated_by, created_at, namaNipPegawai, keteranganPegawai', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'alasanCuti' => array(self::BELONGS_TO, 'AlasanCuti', 'alasan_cuti_id'),
            'pegawai' => array(self::BELONGS_TO, 'Pegawai', 'pegawai_id'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'pegawai_id' => 'Pegawai',
            'nama' => 'Nama',
            'cuti' => 'Cuti (Hari)',
            'mulai_cuti' => 'Mulai Cuti',
            'alasan_cuti_id' => 'Alasan Cuti',
            'keterangan' => 'Keterangan',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'namaNipPegawai' => 'Nama/NIP',
            'keteranganPegawai' => 'Unit Kerja'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('pegawai_id', $this->pegawai_id, true);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('cuti', $this->cuti, true);
        $criteria->compare("DATE_FORMAT(t.mulai_cuti, '%d-%m-%Y')", $this->mulai_cuti, true);
        $criteria->compare('alasan_cuti_id', $this->alasan_cuti_id);
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->with = ['pegawai'];
        $criteria->compare('CONCAT(pegawai.nama,pegawai.nip)', $this->namaNipPegawai, true);
        $criteria->compare("(SELECT CONCAT(cabang.nama,bagian.nama,jabatan.nama) FROM pegawai_mutasi JOIN (SELECT pegawai_id, MAX(per_tanggal) per_tanggal FROM pegawai_mutasi GROUP BY pegawai_id) t_max ON t_max.pegawai_id = pegawai_mutasi.pegawai_id AND t_max.per_tanggal = pegawai_mutasi.per_tanggal JOIN cabang ON cabang.id = pegawai_mutasi.cabang_id JOIN bagian ON bagian.id = pegawai_mutasi.bagian_id JOIN jabatan ON jabatan.id = pegawai_mutasi.jabatan_id WHERE pegawai_mutasi.pegawai_id = t.pegawai_id)", $this->keteranganPegawai, true);

        $sort = [
            'defaultOrder' => 't.mulai_cuti desc, pegawai.nama',
            'attributes' => [
                'namaNipPegawai' => [
                    'asc' => 'CONCAT(pegawai.nama,pegawai.nip)',
                    'desc' => 'CONCAT(pegawai.nama,pegawai.nip) desc'
                ],
                'keteranganPegawai' => [
                    'asc' => '(SELECT CONCAT(cabang.nama,bagian.nama,jabatan.nama) FROM pegawai_mutasi JOIN (SELECT pegawai_id, MAX(per_tanggal) per_tanggal FROM pegawai_mutasi GROUP BY pegawai_id) t_max ON t_max.pegawai_id = pegawai_mutasi.pegawai_id AND t_max.per_tanggal = pegawai_mutasi.per_tanggal JOIN cabang ON cabang.id = pegawai_mutasi.cabang_id JOIN bagian ON bagian.id = pegawai_mutasi.bagian_id JOIN jabatan ON jabatan.id = pegawai_mutasi.jabatan_id WHERE pegawai_mutasi.pegawai_id = t.pegawai_id)',
                    'desc' => '(SELECT CONCAT(cabang.nama,bagian.nama,jabatan.nama) FROM pegawai_mutasi JOIN (SELECT pegawai_id, MAX(per_tanggal) per_tanggal FROM pegawai_mutasi GROUP BY pegawai_id) t_max ON t_max.pegawai_id = pegawai_mutasi.pegawai_id AND t_max.per_tanggal = pegawai_mutasi.per_tanggal JOIN cabang ON cabang.id = pegawai_mutasi.cabang_id JOIN bagian ON bagian.id = pegawai_mutasi.bagian_id JOIN jabatan ON jabatan.id = pegawai_mutasi.jabatan_id WHERE pegawai_mutasi.pegawai_id = t.pegawai_id) desc'
                ],
                '*'
            ]
        ];

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PegawaiCuti the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function beforeSave()
    {

        if ($this->isNewRecord) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        $this->updated_at = null; // Trigger current timestamp
        $this->updated_by = Yii::app()->user->id;
        return parent::beforeSave();
    }

    public function beforeValidate()
    {
        $this->nama = Yii::app()->db->createCommand('select nama from pegawai where id=:pegawaiId')->bindValue(':pegawaiId', $this->pegawai_id)->queryRow()['nama'];
        $this->mulai_cuti = !empty($this->mulai_cuti) ? date_format(date_create_from_format('d-m-Y', $this->mulai_cuti), 'Y-m-d') : NULL;
        return parent::beforeValidate();
    }

    public function afterFind()
    {
        $this->mulai_cuti = !is_null($this->mulai_cuti) ? date_format(date_create_from_format('Y-m-d', $this->mulai_cuti), 'd-m-Y') : '0';
        return parent::afterFind();
    }

    public function getNamaNipPegawai()
    {
        return $this->pegawai->nama . ' / ' . $this->pegawai->nip;
    }

    public function getKeteranganPegawai()
    {
        return $this->pegawai->cabangTerakhir . ' | ' . $this->pegawai->bagianTerakhir . ' | ' . $this->pegawai->jabatanTerakhir;
    }

}

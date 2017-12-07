<?php

/**
 * This is the model class for table "pegawai_mutasi".
 *
 * The followings are the available columns in table 'pegawai_mutasi':
 * @property string $id
 * @property string $pegawai_id
 * @property string $nama
 * @property string $per_tanggal
 * @property string $keterangan
 * @property string $jabatan_id
 * @property string $bagian_id
 * @property string $cabang_id
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Bagian $bagian
 * @property Cabang $cabang
 * @property Jabatan $jabatan
 * @property Pegawai $pegawai
 * @property User $updatedBy
 */
class PegawaiMutasi extends CActiveRecord
{

    public $namaNipPegawai;
    public $keteranganPegawai;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pegawai_mutasi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['pegawai_id, nama, per_tanggal, jabatan_id, bagian_id, cabang_id', 'required', 'message' => '[{attribute}] harus diisi!'],
            ['pegawai_id, jabatan_id, bagian_id, cabang_id, updated_by', 'length', 'max' => 10],
            ['nama', 'length', 'max' => 50],
            ['keterangan', 'length', 'max' => 1000],
            ['created_at, updated_at, updated_by', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, pegawai_id, nama, per_tanggal, keterangan, jabatan_id, bagian_id, cabang_id, updated_at, updated_by, created_at, namaNipPegawai, keteranganPegawai', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'bagian' => [self::BELONGS_TO, 'Bagian', 'bagian_id'],
            'cabang' => [self::BELONGS_TO, 'Cabang', 'cabang_id'],
            'jabatan' => [self::BELONGS_TO, 'Jabatan', 'jabatan_id'],
            'pegawai' => [self::BELONGS_TO, 'Pegawai', 'pegawai_id'],
            'updatedBy' => [self::BELONGS_TO, 'User', 'updated_by'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pegawai_id' => 'Pegawai',
            'nama' => 'Nama',
            'per_tanggal' => 'Per Tanggal',
            'keterangan' => 'Keterangan',
            'jabatan_id' => 'Jabatan',
            'bagian_id' => 'Bagian',
            'cabang_id' => 'Cabang',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'namaNipPegawai' => 'Nama/NIP',
            'keteranganPegawai' => 'Unit Kerja'
        ];
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

        $criteria->compare('id', $this->id);
        $criteria->compare('pegawai_id', $this->pegawai_id);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare("DATE_FORMAT(t.per_tanggal, '%d-%m-%Y')", $this->per_tanggal, true);
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('jabatan_id', $this->jabatan_id);
        $criteria->compare('bagian_id', $this->bagian_id);
        $criteria->compare('cabang_id', $this->cabang_id);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->with = ['pegawai', 'cabang', 'bagian', 'jabatan'];
        $criteria->compare('CONCAT(pegawai.nama,pegawai.nip)', $this->namaNipPegawai, true);
        $criteria->compare("CONCAT(cabang.nama, bagian.nama, jabatan.nama)", $this->keteranganPegawai, true);

        $sort = [
            'defaultOrder' => 't.per_tanggal desc, pegawai.nama',
            'attributes' => [
                'namaNipPegawai' => [
                    'asc' => 'CONCAT(pegawai.nama,pegawai.nip)',
                    'desc' => 'CONCAT(pegawai.nama,pegawai.nip) desc'
                ],
                'keteranganPegawai' => [
                    'asc' => 'CONCAT(cabang.nama, bagian.nama, jabatan.nama)',
                    'desc' => 'CONCAT(cabang.nama, bagian.nama, jabatan.nama) desc'
                ],
                '*'
            ]
        ];
        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'sort' => $sort
        ]);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PegawaiMutasi the static model class
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
        $this->per_tanggal = !empty($this->per_tanggal) ? date_format(date_create_from_format('d-m-Y', $this->per_tanggal), 'Y-m-d') : NULL;
        return parent::beforeValidate();
    }

    public function afterFind()
    {
        $this->per_tanggal = !is_null($this->per_tanggal) ? date_format(date_create_from_format('Y-m-d', $this->per_tanggal), 'd-m-Y') : '0';
        return parent::afterFind();
    }

    public function getNamaNipPegawai()
    {
        return $this->pegawai->nama . ' / ' . $this->pegawai->nip;
    }

    public function getKeteranganPegawai()
    {
        return $this->cabang->nama . ' | ' . $this->bagian->nama . ' | ' . $this->jabatan->nama;
    }

    /**
     * Untuk mengecek apakah pegawaiId sudah pernah mutasi atau belum
     * @param int $pegawaiId
     * @return bool true jika sudah pernah, false jika belum pernah
     */
    public static function sudahPernah($pegawaiId)
    {
        return is_null(self::model()->find('pegawai_id=:pegawaiId', [':pegawaiId' => $pegawaiId])) ? false : true;
    }

}

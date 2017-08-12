<?php

/**
 * This is the model class for table "pegawai_config".
 *
 * The followings are the available columns in table 'pegawai_config':
 * @property string $id
 * @property string $pegawai_id
 * @property string $cuti_tahunan
 * @property integer $bpjs
 * @property string $tunjangan_anak
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 * @property User $updatedBy
 */
class PegawaiConfig extends CActiveRecord
{

    const BPJS_TIDAK_ADA = 0;
    const BPJS_ADA = 1;

    public $namaPegawai;
    public $keteranganPegawai;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pegawai_config';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['pegawai_id', 'required', 'message' => '[{attribute}] harus dipilih!'],
            ['bpjs', 'numerical', 'integerOnly' => true],
            ['pegawai_id, updated_by', 'length', 'max' => 10],
            ['cuti_tahunan', 'length', 'max' => 5],
            ['tunjangan_anak', 'length', 'max' => 18],
            ['created_at, updated_at, updated_by', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, pegawai_id, cuti_tahunan, bpjs, tunjangan_anak, updated_at, updated_by, created_at, namaPegawai, keteranganPegawai', 'safe', 'on' => 'search'],
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
            'cuti_tahunan' => 'Cuti Tahunan (Hari)',
            'bpjs' => 'BPJS',
            'tunjangan_anak' => 'Tunjangan Anak',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'namaPegawai' => 'Nama',
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
        $criteria->compare('cuti_tahunan', $this->cuti_tahunan, true);
        $criteria->compare('bpjs', $this->bpjs);
        $criteria->compare('tunjangan_anak', $this->tunjangan_anak, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->with = ['pegawai', 'pegawai.cabang', 'pegawai.bagian', 'pegawai.jabatan'];
        $criteria->compare('pegawai.nama', $this->namaPegawai, true);
        $criteria->compare("CONCAT(cabang.nama, bagian.nama, jabatan.nama)", $this->keteranganPegawai, true);


        $sort = [
            'attributes' => [
                'namaPegawai' => [
                    'asc' => 'pegawai.nama',
                    'desc' => 'pegawai.nama desc'
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
     * @return PegawaiConfig the static model class
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

    public static function listBpjs()
    {
        return [
            self::BPJS_TIDAK_ADA => 'Tidak',
            self::BPJS_ADA => 'Ada',
        ];
    }

    public function getNamaBpjs()
    {
        return $this->listBpjs()[$this->bpjs];
    }

    public function getKeteranganPegawai()
    {
        return $this->pegawai->cabang->nama . ' | ' . $this->pegawai->bagian->nama . ' | ' . $this->pegawai->jabatan->nama;
    }

}

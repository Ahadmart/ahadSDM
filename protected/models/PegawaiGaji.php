<?php

/**
 * This is the model class for table "pegawai_gaji".
 *
 * The followings are the available columns in table 'pegawai_gaji':
 * @property string $id
 * @property string $pegawai_id
 * @property string $gaji
 * @property string $per_tanggal
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 * @property User $updatedBy
 */
class PegawaiGaji extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pegawai_gaji';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['pegawai_id, gaji, per_tanggal', 'required', 'message' => '[{attribute}] harus diisi!'],
            ['pegawai_id, updated_by', 'length', 'max' => 10],
            ['gaji', 'length', 'max' => 18],
            ['created_at, updated_at, updated_by', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, pegawai_id, gaji, per_tanggal, updated_at, updated_by, created_at', 'safe', 'on' => 'search'],
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
            'gaji' => 'Gaji',
            'per_tanggal' => 'Per Tanggal',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
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
        $criteria->compare('gaji', $this->gaji, true);
        $criteria->compare('per_tanggal', $this->per_tanggal, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by, true);
        $criteria->compare('created_at', $this->created_at, true);

        $sort = [
            'defaultOrder' => 'per_tanggal desc'
        ];

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PegawaiGaji the static model class
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
        $this->per_tanggal = !empty($this->per_tanggal) ? date_format(date_create_from_format('d-m-Y', $this->per_tanggal), 'Y-m-d') : NULL;
        return parent::beforeValidate();
    }

    public function afterFind()
    {
        $this->per_tanggal = !is_null($this->per_tanggal) ? date_format(date_create_from_format('Y-m-d', $this->per_tanggal), 'd-m-Y') : '0';
        return parent::afterFind();
    }

}

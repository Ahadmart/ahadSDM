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
		return array(
			array('pegawai_id, updated_at, updated_by', 'required', 'message' => '[{attribute}] harus diisi!'),
			array('bpjs', 'numerical', 'integerOnly'=>true),
			array('pegawai_id, updated_by', 'length', 'max'=>10),
			array('cuti_tahunan', 'length', 'max'=>4),
			array('tunjangan_anak', 'length', 'max'=>18),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pegawai_id, cuti_tahunan, bpjs, tunjangan_anak, updated_at, updated_by, created_at', 'safe', 'on'=>'search'),
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
			'cuti_tahunan' => 'Cuti Tahunan',
			'bpjs' => 'Bpjs',
			'tunjangan_anak' => 'Tunjangan Anak',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
			'created_at' => 'Created At',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('pegawai_id',$this->pegawai_id,true);
		$criteria->compare('cuti_tahunan',$this->cuti_tahunan,true);
		$criteria->compare('bpjs',$this->bpjs);
		$criteria->compare('tunjangan_anak',$this->tunjangan_anak,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PegawaiConfig the static model class
	 */
	public static function model($className=__CLASS__)
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
}

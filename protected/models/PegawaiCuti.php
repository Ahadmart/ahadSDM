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
 * @property string $alasan
 * @property string $keterangan
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 * @property User $updatedBy
 */
class PegawaiCuti extends CActiveRecord
{
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
			array('pegawai_id, nama, cuti, mulai_cuti, alasan, keterangan, updated_at, updated_by', 'required', 'message' => '[{attribute}] harus diisi!'),
			array('pegawai_id, updated_by', 'length', 'max'=>10),
			array('nama', 'length', 'max'=>50),
			array('cuti', 'length', 'max'=>4),
			array('alasan', 'length', 'max'=>20),
			array('keterangan', 'length', 'max'=>250),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pegawai_id, nama, cuti, mulai_cuti, alasan, keterangan, updated_at, updated_by, created_at', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama',
			'cuti' => 'Cuti',
			'mulai_cuti' => 'Mulai Cuti',
			'alasan' => 'Alasan',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('cuti',$this->cuti,true);
		$criteria->compare('mulai_cuti',$this->mulai_cuti,true);
		$criteria->compare('alasan',$this->alasan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
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
	 * @return PegawaiCuti the static model class
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

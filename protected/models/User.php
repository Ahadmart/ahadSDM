<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $nama
 * @property string $nama_lengkap
 * @property string $password
 * @property string $last_logon
 * @property string $last_ipaddress
 * @property integer $theme_id
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Theme $theme
 */
class User extends CActiveRecord
{

    public $newPassword;
    public $newPasswordRepeat;
    public $namaTheme;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['nama', 'required', 'message' => '{attribute} tidak boleh kosong'],
            //array('last_ipaddress', 'numerical', 'integerOnly' => true),
            ['newPassword, newPasswordRepeat', 'required', 'on' => 'create'],
            ['newPassword', 'compare', 'compareAttribute' => 'newPasswordRepeat'],
            //array('updated_by', 'numerical', 'integerOnly'=>true),
            ['nama', 'length', 'max' => 45],
            ['nama_lengkap', 'length', 'max' => 100],
            ['password', 'length', 'max' => 512],
            ['theme_id, updated_by', 'length', 'max' => 10],
            ['last_ipaddress', 'length', 'max' => 15],
            ['last_logon, created_at, updated_at, updated_by, newPasswordRepeat', 'safe'],
            ['last_logon, last_ipaddress', 'safe', 'on' => 'update'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, nama, nama_lengkap, last_logon, last_ipaddress, created_at, updated_at, updated_by', 'safe', 'on' => 'search'],
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
            'theme' => [self::BELONGS_TO, 'Theme', 'theme_id'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nama_lengkap' => 'Nama Lengkap',
            'password' => 'Password',
            'last_logon' => 'Last Logon',
            'last_ipaddress' => 'Last IP Address',
            'theme_id' => 'Theme',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
        $criteria->compare('t.nama', $this->nama, true);
        $criteria->compare('nama_lengkap', $this->nama_lengkap, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('theme_id', $this->theme_id, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by);

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => ['pageSize' => 3]
        ]);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
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
        if (!empty($this->newPassword)) {
            $this->password = base64_encode($this->hashPassword($this->newPassword));
        }
        $this->updated_at = date("Y-m-d H:i:s");
        $this->updated_by = Yii::app()->user->id;
        return parent::beforeSave();
    }

    public function afterSave()
    {
        $theme = Theme::model()->findByPk($this->theme_id);
        $theme->toCookies();
        return parent::afterSave();
    }

    public function validatePassword($password)
    {
        return password_verify($password, base64_decode($this->password));
    }

    public function hashPassword($password)
    {
        $options = [
            'cost' => $this->findCost(),
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function findCost()
    {
        $cost = 12;
        // Uncomment untuk mengetahui cost optimum
        // dari komputer yang bisa digunakan

        /*
          $timeTarget = 0.2;

          $cost = 9;
          do {
          $cost++;
          $start = microtime(true);
          password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
          $end = microtime(true);
          } while (($end - $start) < $timeTarget);
         */

        return $cost;
    }

    // Menghapus record di tabel AuthAssignment
    // di comment jika tidak pakai CDBAuth..

    public function afterDelete()
    {
        AuthAssignment::model()->deleteAll('userid=' . $this->id);
        return parent::afterDelete();
    }

}

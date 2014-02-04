<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $active
 * @property integer $phone
 * @property string $email
 * @property string $password
 * @property integer $credits
 * @property string $date_register
 * @property string $token
 * @property string $device_id
 * @property string $push_id
 *
 * The followings are the available model relations:
 * @property Item[] $items
 * @property Purchase[] $purchases
 */
class User extends CActiveRecord
{
	
	public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
 
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
	
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
		return array(
			array('email, password, date_register', 'required'),
			array('active,phone, credits', 'numerical', 'integerOnly'=>true),
			array('email, password, token, device_id, push_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,active,phone, email, password, credits, date_register, token, device_id, push_id', 'safe', 'on'=>'search'),
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
			'items' => array(self::HAS_MANY, 'Item', 'user_id'),
			'purchases' => array(self::HAS_MANY, 'Purchase', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'active' => "Active",
			'phone' => 'Phone',
			'email' => 'Email',
			'password' => 'Password',
			'credits' => 'Credits',
			'date_register' => 'Date Register',
			'token' => 'Token',
			'device_id' => 'Devide',
			'push_id' => 'Push',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('active',$this->active);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('credits',$this->credits);
		$criteria->compare('date_register',$this->date_register,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('device_id',$this->device_id,true);
		$criteria->compare('push_id',$this->push_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

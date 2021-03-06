<?php

/**
 * This is the model class for table "ad".
 *
 * The followings are the available columns in table 'ad':
 * @property integer $id
 * @property string $image_url
 * @property string $link
 * @property integer $is_mobile
 * @property integer $num_views
 * @property string $date_published
 * @property string $date_end
 */
class Ad extends CActiveRecord
{
	
	/**
	 * @return array representing the object
	 */
	public function toArray()
	{
		return array(
			"id" => $this->id,
			"image_url" => $this->image_url,
			"link" => $this->link,
			"is_mobile" => $this->is_mobile,
			"date_published" => $this->date_published,
			"date_end" => $this->date_end,
		);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image_url, link, date_published', 'required'),
			array('is_mobile, num_views', 'numerical', 'integerOnly'=>true),
			array('image_url, link', 'length', 'max'=>255),
			array('date_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image_url, link, is_mobile, num_views, date_published, date_end', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image_url' => 'Image Url',
			'link' => 'Link',
			'is_mobile' => 'Is Mobile',
			'num_views' => 'Num Views',
			'date_published' => 'Date Published',
			'date_end' => 'Date End',
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
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('is_mobile',$this->is_mobile);
		$criteria->compare('num_views',$this->num_views);
		$criteria->compare('date_published',$this->date_published,true);
		$criteria->compare('date_end',$this->date_end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

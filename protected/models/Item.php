<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property double $price
 * @property integer $phone
 * @property string $image_url
 * @property string $location
 * @property string $date_published
 * @property string $date_end
 * @property integer $num_views
 * @property integer $premium
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Category $category
 */
class Item extends CActiveRecord
{


	/**
	 * @return array representing the object
	 */	 
	public function toArray()
	{
		return array(
			"id" => $this->id,
			"category_id" => $this->category_id,
			"title" => $this->title,
			"description" => $this->description,
			"price" => $this->price,
			"phone" => $this->phone,
			"location" => $this->location,
			"image_url" => $this->image_url,
			"date_published" => $this->date_published,			
			"date_end" => $this->date_end,
			"num_views" => $this->num_views,
			"premium" => $this->premium,
		);
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, category_id, title, description, price, phone, image_url, location, date_published', 'required'),
			array('user_id, category_id, phone, num_views, premium', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title, image_url, location', 'length', 'max'=>255),
			array('date_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, category_id, title, description, price, phone, image_url, location, date_published, date_end, num_views', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'category_id' => 'Category',
			'title' => 'Title',
			'description' => 'Description',
			'price' => 'Price',
			'phone' => 'Phone',
			'image_url' => 'Image Url',
			'location' => 'Location',
			'date_published' => 'Date Published',
			'date_end' => 'Date End',
			'num_views' => 'Num Views',
			'premium' => 'Premium',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('date_published',$this->date_published,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('num_views',$this->num_views);
		$criteria->compare('premium',$this->premium);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

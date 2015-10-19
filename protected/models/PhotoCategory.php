<?php

/**
 * This is the model class for table "photo_category".
 *
 * The followings are the available columns in table 'photo_category':
 * @property integer $id
 * @property string $image
 * @property string $title_ru
 * @property string $title_uk
 * @property string $description_ru
 * @property string $description_uk
 * @property string $date
 * @property integer $in_slider
 * @property integer $category_id
 * @property integer $reclame
 * @property integer $type
 * @property integer $views
 * @property integer $rss
 * @property integer $redaction_chose
 * @property string $short_ru
 * @property string $short_uk
 */
class PhotoCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photo_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title_ru, title_uk, image, category_id, short_uk, short_ru', 'required'),
			array('in_slider, category_id, reclame, redaction_chose, rss', 'numerical', 'integerOnly'=>true),
			array('image, title_ru, title_uk', 'length', 'max'=>255),
			array('type', 'length', 'max'=>15),
			array('author', 'length', 'max'=>100),
			array('short_uk, short_ru', 'length', 'max'=>150),
			array('description_ru, description_uk, date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image, title_ru, title_uk, description_ru, description_uk, date, in_slider, category_id, reclame, type, views, redaction_chose, rss, short_uk, short_ru', 'safe', 'on'=>'search'),
		);
	}

    public function afterValidate(){
        if(empty($this->date)){
            $this->date = new CDbExpression('NOW()');
        }
        return parent::afterValidate();
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'category'=>array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main', 'ID'),
			'image' => Yii::t('main', 'Зображення'),
			'title_ru' => Yii::t('main', 'Назва РУС'),
			'title_uk' => Yii::t('main', 'Назва УКР'),
			'description_ru' => Yii::t('main', 'Опис новини РУС'),
			'description_uk' => Yii::t('main', 'Опис новини УКР'),
			'date' => Yii::t('main', 'Дата'),
			'in_slider' => Yii::t('main', 'В слайдер?'),
			'category_id' => Yii::t('main', 'Категорiя'),
			'reclame' => Yii::t('main', 'Реклама'),
			'rss' => Yii::t('main', 'RSS'),
			'short_uk' => Yii::t('main', 'Короткий опис uk'),
			'short_ru' => Yii::t('main', 'Короткий опис ru'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->order = 'id DESC';
		$criteria->compare('id',$this->id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_uk',$this->title_uk,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_uk',$this->description_uk,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('in_slider',$this->in_slider);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('reclame',$this->reclame);
		$criteria->compare('rss',$this->rss);
		$criteria->compare('short_ru',$this->short_ru);
		$criteria->compare('short_uk',$this->short_uk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PhotoCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

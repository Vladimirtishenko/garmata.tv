<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title_ru
 * @property string $title_uk
 * @property string $description_ru
 * @property string $description_uk
 * @property string $image
 * @property string $date
 * @property string $modify_date
 * @property integer $views
 * @property string $category_id
 * @property string $tags
 * @property integer $galery_id
 * @property string $author
 * @property integer $modify_by_id
 * @property integer $marker
 * @property integer $author_id
 * @property integer $in_slider
 * @property integer $reclame
 * @property integer $type
 * @property integer $redaction_chose
 * @property integer $rss
 * @property string $short_ru
 * @property string $short_uk
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title_ru, title_uk, description_ru, description_uk, category_id, author, short_uk, short_ru', 'required'),
			array('views, galery_id, modify_by_id, marker, author_id, in_slider, reclame, redaction_chose, rss', 'numerical', 'integerOnly'=>true),
			array('title_ru, title_uk, image, tags', 'length', 'max'=>255),
			array('category_id', 'length', 'max'=>50),
			array('author', 'length', 'max'=>100),
			array('short_uk, short_ru', 'length', 'max'=>150),
			array('type', 'length', 'max'=>15),
			array('date, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('short_uk, short_ru, id, title_ru, title_uk, description_ru, description_uk, image, date, modify_date, views, category_id, tags, galery_id, author, modify_by_id, marker, author_id, in_slider, reclame, redaction_chose, type', 'safe', 'on'=>'search'),
		);
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
			'title_ru' => Yii::t('main', 'Назва РУС'),
			'title_uk' => Yii::t('main', 'Назва УКР'),
			'description_ru' => Yii::t('main', 'Опис новини РУС'),
			'description_uk' => Yii::t('main', 'Опис новини УКР'),
			'image' => Yii::t('main', 'Зображення'),
			'date' => Yii::t('main', 'Дата'),
			'modify_date' => Yii::t('main', 'Дата редагування'),
			'views' => Yii::t('main', 'Перегляди'),
			'category_id' => Yii::t('main', 'Категорiя'),
			'tags' => Yii::t('main', 'Теги'),
			'galery_id' => Yii::t('main', 'Галерея'),
			'author' => Yii::t('main', 'Автор'),
			'modify_by_id' => Yii::t('main', 'Modify By'),
			'marker' => Yii::t('main', 'Marker'),
			'author_id' => Yii::t('main', 'Автор id'),
			'in_slider' => Yii::t('main', 'В слайдер?'),
			'reclame' => Yii::t('main', 'Рекламний матерiал'),
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
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_uk',$this->title_uk,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_uk',$this->description_uk,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('galery_id',$this->galery_id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('modify_by_id',$this->modify_by_id);
		$criteria->compare('marker',$this->marker);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('in_slider',$this->in_slider);
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
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

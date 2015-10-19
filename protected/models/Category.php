<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $alias
 * @property string $title_ru
 * @property string $title_uk
 * @property integer $parent_id
 * @property string $description_ru
 * @property string $description_uk
 * @property string $meta_title_ru
 * @property string $meta_title_uk
 * @property string $meta_description_ru
 * @property string $meta_description_uk
 * @property string $meta_keywords_ru
 * @property string $meta_keywords_uk
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title_ru, title_uk', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('alias', 'length', 'max'=>150),
			array('title_ru, title_uk, meta_title_ru, meta_title_uk, meta_description_ru, meta_description_uk, meta_keywords_ru, meta_keywords_uk', 'length', 'max'=>250),
			array('description_ru, description_uk', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, alias, title_ru, title_uk, parent_id, description_ru, description_uk, meta_title_ru, meta_title_uk, meta_description_ru, meta_description_uk, meta_keywords_ru, meta_keywords_uk', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'news'=>array(self::HAS_MANY, 'News', 'category_id'),
            'videos'=>array(self::HAS_MANY, 'News', 'category_id'),
            'photoCategories'=>array(self::HAS_MANY, 'PhotoCategory', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main', 'ID'),
			'alias' => Yii::t('main', 'Alias'),
			'title_ru' => Yii::t('main', 'Назва РУС'),
			'title_uk' => Yii::t('main', 'Назва УКР'),
			'description_ru' => Yii::t('main', 'Опис новини РУС'),
			'description_uk' => Yii::t('main', 'Опис новини УКР'),
			'parent_id' => Yii::t('main', 'Parent'),
			'meta_title_ru' => Yii::t('main', 'Meta Title РУС'),
			'meta_title_uk' => Yii::t('main', 'Meta Title УКР'),
			'meta_description_ru' => Yii::t('main', 'Meta Description РУС'),
			'meta_description_uk' => Yii::t('main', 'Meta Description УКР'),
			'meta_keywords_ru' => Yii::t('main', 'Meta Keywords РУС'),
			'meta_keywords_uk' => Yii::t('main', 'Meta Keywords УКР'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_uk',$this->title_uk,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_uk',$this->description_uk,true);
		$criteria->compare('meta_title_ru',$this->meta_title_ru,true);
		$criteria->compare('meta_title_uk',$this->meta_title_uk,true);
		$criteria->compare('meta_description_ru',$this->meta_description_ru,true);
		$criteria->compare('meta_description_uk',$this->meta_description_uk,true);
		$criteria->compare('meta_keywords_ru',$this->meta_keywords_ru,true);
		$criteria->compare('meta_keywords_uk',$this->meta_keywords_uk,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

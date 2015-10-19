<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $title_ru
 * @property string $title_uk
 * @property string $description_ru
 * @property string $description_uk
 * @property string $author_ru
 * @property string $author_uk
 * @property string $image
 * @property string $profession_ru
 * @property string $profession_uk
 */
class Pages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title_ru, title_uk, description_ru, description_uk, author_ru, author_uk, image', 'required'),
			array('title_ru, title_uk, author_ru, author_uk, image, profession_ru, profession_uk', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_ru, title_uk, description_ru, description_uk, author_ru, author_uk, image, profession_ru, profession_uk', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
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
			'author_ru' => Yii::t('main', 'Автор РУС'),
			'author_uk' => Yii::t('main', 'Автор Укр'),
			'image' => Yii::t('main', 'Зображення'),
			'profession_ru' => Yii::t('main', 'Профеciя РУС'),
			'profession_uk' => Yii::t('main', 'Профеciя УКР'),
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
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_uk',$this->title_uk,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_uk',$this->description_uk,true);
		$criteria->compare('author_ru',$this->author_ru,true);
		$criteria->compare('author_uk',$this->author_uk,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('profession_ru',$this->profession_ru,true);
		$criteria->compare('profession_uk',$this->profession_uk,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

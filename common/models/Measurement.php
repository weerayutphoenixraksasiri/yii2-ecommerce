<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "measurement".
 *
 * @property integer $id
 * @property integer $gender_id
 * @property string $measurement
 * @property string $photo
 * @property string $description
 *
 * @property Gender $gender
 * @property ProductHasMeasurement[] $productHasMeasurements
 * @property Product[] $products
 */
class Measurement extends \yii\db\ActiveRecord
{
    public $uploadFolder = 'uploads/measurement';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'measurement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender_id', 'measurement'], 'required'],
            [['gender_id'], 'integer'],
            [['description'], 'string'],
            [['measurement'], 'string', 'max' => 100],
            [['photo'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender_id' => 'เพศ',
            'measurement' => 'วัดตัว',
            'photo' => 'รูปภาพ',
            'description' => 'รายละเอียด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasMeasurements()
    {
        return $this->hasMany(ProductHasMeasurement::className(), ['measurement_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('product_has_measurement', ['measurement_id' => 'id']);
    }
    
    public function upload($model, $attribute)
    {
        $photo = UploadedFile::getInstance($model, $attribute);
        
        if($this->validate() && $photo !== null)
        {
            
            $file_name = $model->isNewRecord ? substr(md5($photo->baseName.time()),0,15).'.'.$photo->extension : $model->getOldAttribute($attribute);
            if($photo->saveAs($this->getUploadPath().$file_name))
            {
                return $file_name;
            }
        }
        
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }
    public function getUploadPath()
    {
        return Yii::getAlias('@webroot').'/'.$this->uploadFolder.'/';
    }
}

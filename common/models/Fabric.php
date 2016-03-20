<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "fabric".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $price
 * @property string $photo
 *
 * @property Product[] $products
 */
class Fabric extends \yii\db\ActiveRecord
{
    public $uploadFolder = 'uploads/fabric';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fabric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'integer'],
            [['title'], 'string', 'max' => 45],
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
            'title' => 'ผ้า',
            'description' => 'รายละเอียด',
            'price' => 'ราคา',
            'photo' => 'รูปภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['fabric_id' => 'id']);
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

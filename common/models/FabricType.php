<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "fablic_type".
 *
 * @property integer $id
 * @property string $fablic_type
 * @property string $description
 * @property string $photo
 *
 * @property Models[] $models
 */
class FabricType extends \yii\db\ActiveRecord
{
    public $uploadFolder = 'uploads/fabrictype';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fabric_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabric_type', 'description'], 'required'],
            [['description'], 'string'],
            [['fabric_type', 'photo'], 'string', 'max' => 100],
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
            'fabric_type' => 'หมวดหมู่แบบเสื้อ',
            'description' => 'รายละเอียด',
            'photo' => 'รูปภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Models::className(), ['fabric_type_id' => 'id']);
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

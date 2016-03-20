<?php

namespace common\models;

use Yii;
use common\models\FabricType;
use yii\web\UploadedFile;


/**
 * This is the model class for table "models".
 *
 * @property integer $id
 * @property integer $fablic_type_id
 * @property integer $gender_id
 * @property string $title
 * @property string $description
 * @property integer $price
 *
 * @property FablicType $fablicType
 * @property Gender $gender
 * @property Product[] $products
 */
class Models extends \yii\db\ActiveRecord
{
    public $uploadFolder = 'uploads/model';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabric_type_id', 'gender_id', 'title', 'description', 'price'], 'required'],
            [['fabric_type_id', 'gender_id', 'price', 'ship_cost_in', 'ship_cost_out'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'fabric_type_id' => 'ชนิด',
            'gender_id' => 'เพศ',
            'title' => 'แบบ',
            'description' => 'รายละเอียด',
            'price' => 'ราคา',
            'ship_cost_in' => 'ค่าขนส่งในประเทศ',
            'ship_cost_out' => 'ค่าขนส่งต่างประเทศ',
            'photo' => 'รูปภาพ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFabricType()
    {
        return $this->hasOne(FabricType::className(), ['id' => 'fabric_type_id']);
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
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['models_id' => 'id']);
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

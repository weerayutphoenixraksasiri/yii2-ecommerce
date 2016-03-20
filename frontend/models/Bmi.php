<?php

namespace frontend\models;

use yii\base\Model;

class Bmi extends Model 
{
    public $hight;
    public $weight;
    
    public function rules() 
    {
        return [
            [['hight', 'weight'], 'required'],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'hight' => 'ส่วนสูง (เมตร)',
            'weight' => 'น้ำหนัก (กก.)',
        ];
    }
}

<?php

namespace frontend\models;
use yii\db\ActiveRecord;

class Post extends ActiveRecord {
    
    public static function tableName() {
        return 'post';
    }
    
    public function rules()
    {
        return [
            [['title', 'description'], 'required']
        ];
    }
    
    public function attributeLabels() {
        return [
            'title' => 'เรื่อง',
            'description' => 'รายละเอียด',
            'created_at' => 'เพิ่มเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shipping".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $address
 * @property string $ship_method
 *
 * @property Order $order
 */
class Shipping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'address', 'ship_method'], 'required'],
            [['order_id'], 'integer'],
            [['address', 'ship_method'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'address' => 'Address',
            'ship_method' => 'ใน/ต่างประเทศ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}

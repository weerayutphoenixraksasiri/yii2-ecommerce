<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_measurement".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $measurement_id
 * @property string $val
 *
 * @property Product $product
 * @property Measurement $measurement
 */
class ProductMeasurement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_measurement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'measurement_id', 'val'], 'required'],
            [['product_id', 'measurement_id'], 'integer'],
            [['val'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'measurement_id' => 'Measurement ID',
            'val' => 'Val',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeasurement()
    {
        return $this->hasOne(Measurement::className(), ['id' => 'measurement_id']);
    }
}

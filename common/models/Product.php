<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $models_id
 * @property integer $fabric_id
 * @property integer $order_id
 * @property integer $total_price
 *
 * @property Models $models
 * @property Fabric $fabric
 * @property Order $order
 * @property ProductHasMeasurement[] $productHasMeasurements
 * @property Measurement[] $measurements
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['models_id', 'fabric_id', 'order_id', 'total_price'], 'required'],
            [['models_id', 'fabric_id', 'order_id', 'total_price'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'models_id' => 'Models ID',
            'fabric_id' => 'Fabric ID',
            'order_id' => 'Order ID',
            'total_price' => 'Total Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasOne(Models::className(), ['id' => 'models_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFabric()
    {
        return $this->hasOne(Fabric::className(), ['id' => 'fabric_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasMeasurements()
    {
        return $this->hasMany(ProductHasMeasurement::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeasurements()
    {
        return $this->hasMany(Measurement::className(), ['id' => 'measurement_id'])->viaTable('product_has_measurement', ['product_id' => 'id']);
    }
}

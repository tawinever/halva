<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $supply_id
 * @property string $title
 * @property string $description
 * @property integer $price
 * @property integer $duration
 * @property string $created_at
 *
 * @property User $supply
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
            [['supply_id', 'title', 'description', 'price', 'duration'], 'required'],
            [['supply_id', 'price', 'duration'], 'integer'],
            [['title', 'description'], 'string'],
            [['created_at'], 'safe'],
            [['supply_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['supply_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supply_id' => 'Supply ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'duration' => 'Duration',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupply()
    {
        return $this->hasOne(User::className(), ['id' => 'supply_id']);
    }
}

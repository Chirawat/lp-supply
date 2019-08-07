<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "description".
 *
 * @property int $id
 * @property int $document_id
 * @property string $item
 * @property string $quantity
 * @property string $unit
 * @property string $unit_price
 * @property string $price
 *
 * @property Documents $document
 */
class Description extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_id', 'item', 'quantity', 'unit_price', 'price'], 'required'],
            [['document_id'], 'integer'],
            [['item', 'quantity', 'unit', 'unit_price', 'price'], 'string', 'max' => 45],
            [['document_id'], 'exist', 'skipOnError' => true, 'targetClass' => Documents::className(), 'targetAttribute' => ['document_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_id' => 'Document ID',
            'item' => 'Item',
            'quantity' => 'Quantity',
            'unit' => 'Unit',
            'unit_price' => 'Unit Price',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Documents::className(), ['id' => 'document_id']);
    }
}

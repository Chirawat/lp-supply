<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "description_jj".
 *
 * @property int $id
 * @property string $item
 * @property string $quantity
 * @property string $unit
 * @property double $unit_price
 * @property double $price
 * @property int $documents_jj_id
 *
 * @property DocumentsJj $documentsJj
 */
class DescriptionJj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description_jj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item', 'quantity', 'unit_price', 'price', 'documents_jj_id'], 'required'],
            [['unit_price', 'price'], 'number'],
            [['documents_jj_id'], 'integer'],
            [['item', 'quantity', 'unit'], 'string', 'max' => 45],
            [['documents_jj_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentsJj::className(), 'targetAttribute' => ['documents_jj_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Item',
            'quantity' => 'Quantity',
            'unit' => 'Unit',
            'unit_price' => 'Unit Price',
            'price' => 'Price',
            'documents_jj_id' => 'Documents Jj ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentsJj()
    {
        return $this->hasOne(DocumentsJj::className(), ['id' => 'documents_jj_id']);
    }
}

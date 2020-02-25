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
 * @property double $unit_price
 * @property double $price
 * @property int $PSD_Type_Id
 * @property int $PSD_Group_Id
 *
 * @property PsdGroup $pSDGroup
 * @property PsdType $pSDType
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
            [['document_id', 'item', 'quantity', 'unit_price', 'price', 'PSD_Type_Id', 'PSD_Group_Id'], 'required'],
            [['document_id', 'PSD_Type_Id', 'PSD_Group_Id'], 'integer'],
            [['unit_price', 'price'], 'number'],
            [['item', 'quantity', 'unit'], 'string', 'max' => 45],
            [['PSD_Group_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PsdGroup::className(), 'targetAttribute' => ['PSD_Group_Id' => 'id']],
            [['PSD_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PsdType::className(), 'targetAttribute' => ['PSD_Type_Id' => 'id']],
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
            'PSD_Type_Id' => 'Psd Type ID',
            'PSD_Group_Id' => 'Psd Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPSDGroup()
    {
        return $this->hasOne(PsdGroup::className(), ['id' => 'PSD_Group_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPSDType()
    {
        return $this->hasOne(PsdType::className(), ['id' => 'PSD_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Documents::className(), ['id' => 'document_id']);
    }
}

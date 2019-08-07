<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "docdescription".
 *
 * @property int $id
 * @property string $quantity
 * @property string $unitCost
 * @property int $docFile_id
 * @property string $no
 * @property string $description
 * @property string $unitDescription
 * @property string $price
 *
 * @property Docfile $docFile
 */
class DocDescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docdescription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'unitCost', 'unitDescription', 'price'], 'number'],
            [['docFile_id'], 'required'],
            [['docFile_id'], 'integer'],
            [['description'], 'string'],
            [['no'], 'string', 'max' => 45],
            [['docFile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docfile::className(), 'targetAttribute' => ['docFile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Quantity',
            'unitCost' => 'Unit Cost',
            'docFile_id' => 'Doc File ID',
            'no' => 'No',
            'description' => 'Description',
            'unitDescription' => 'Unit Description',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocFile()
    {
        return $this->hasOne(Docfile::className(), ['id' => 'docFile_id']);
    }
}

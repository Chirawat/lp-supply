<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string $doc_date วันที่ออกเอกสาร
 * @property string $type
 * @property string $plan
 * @property string $do
 * @property int $supplier_id
 * @property int $amt
 * @property string $invoice_id
 * @property string $invoice_date
 * @property string $for
 * @property string $advance_by
 * @property string $position ตำแหน่ง
 *
 * @property Description[] $descriptions
 * @property Supplier $supplier
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_date', 'type', 'supplier_id', 'amt', 'invoice_id', 'invoice_date', 'for', 'advance_by', 'position'], 'required'],
            [['do', 'for'], 'string'],
            [['supplier_id', 'amt'], 'integer'],
            [['doc_date', 'type', 'plan', 'invoice_id', 'invoice_date', 'advance_by', 'position'], 'string', 'max' => 45],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_date' => 'Doc Date',
            'type' => 'Type',
            'plan' => 'Plan',
            'do' => 'Do',
            'supplier_id' => 'Supplier ID',
            'amt' => 'Amt',
            'invoice_id' => 'Invoice ID',
            'invoice_date' => 'Invoice Date',
            'for' => 'For',
            'advance_by' => 'Advance By',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::className(), ['document_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }
}

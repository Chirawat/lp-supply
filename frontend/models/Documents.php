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
            [['id', 'doc_date', 'supplier_id', 'amt', 'invoice_id', 'invoice_date', 'for', 'advance_by', 'position'], 'required'],
            [['id', 'supplier_id','year', 'doc_id'], 'integer'],
            [['amt'], 'number'],
            [['do', 'for'], 'string'],
            [['doc_date', 'plan', 'invoice_id', 'invoice_date', 'advance_by', 'position'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'เลขที่เอกสาร',
            'doc_date' => 'วันที่ออกเอกสาร',
            //'type' => 'Type',
            'plan' => 'โครงการ',
            'for' => 'กิจกรรม',
            'do' => 'ใช้ทำอะไร',
            'supplier_id' => 'Supplier ID',
            'amt' => 'จำนวนเงิน',
            'invoice_id' => 'เลขที่ใบเสร็จ',
            'invoice_date' => 'วันที่ออกใบเสร็จ',
            'advance_by' => 'สำรองจ่ายโดย',
            'position' => 'ตำแหน่ง',
            'year' => 'ปีงบประมาณ',
            'doc_id' => 'เลขที่'
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

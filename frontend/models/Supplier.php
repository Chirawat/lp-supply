<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property string $district
 * @property string $province
 * @property string $tax_id
 * @property string $phone
 * @property string $type
 *
 * @property Documents[] $documents
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'district', 'province', 'type'], 'required'],
            [['name', 'adress'], 'string'],
            [['district', 'province', 'tax_id', 'phone', 'type'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'adress' => 'Adress',
            'district' => 'District',
            'province' => 'Province',
            'tax_id' => 'Tax ID',
            'phone' => 'Phone',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['supplier_id' => 'id']);
    }
}

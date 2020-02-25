<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "psd_type".
 *
 * @property int $id
 * @property int $Group_Id
 * @property string $Type_Name
 * @property string $Type_Unit
 *
 * @property Description[] $descriptions
 * @property PsdGroup $group
 */
class PsdType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psd_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Group_Id', 'Type_Name', 'Type_Unit'], 'required'],
            [['id', 'Group_Id'], 'integer'],
            [['Type_Name'], 'string', 'max' => 200],
            [['Type_Unit'], 'string', 'max' => 45],
            [['id', 'Group_Id'], 'unique', 'targetAttribute' => ['id', 'Group_Id']],
            [['Group_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PsdGroup::className(), 'targetAttribute' => ['Group_Id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Group_Id' => 'Group ID',
            'Type_Name' => 'Type Name',
            'Type_Unit' => 'Type Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::className(), ['PSD_Type_Id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(PsdGroup::className(), ['id' => 'Group_Id']);
    }
}

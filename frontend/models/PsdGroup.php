<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "psd_group".
 *
 * @property int $id
 * @property string $Name
 *
 * @property PsdType[] $psdTypes
 */
class PsdGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psd_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsdTypes()
    {
        return $this->hasMany(PsdType::className(), ['Group_Id' => 'id']);
    }
}

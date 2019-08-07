<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "docFile".
 *
 * @property int $id
 * @property int $supplier_id
 * @property string $type
 * @property string $year
 * @property string $docDate
 * @property string $from
 * @property string $project
 * @property string $activity
 * @property string $useDate
 * @property string $objective
 * @property string $buyAmt
 * @property string $chairMan
 * @property string $chairManPos
 */
class DocFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docFile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplier_id', 'year', 'docDate', 'from', 'buyAmt', 'chairMan', 'chairManPos'], 'required'],
            [['supplier_id'], 'integer'],
            [['year', 'buyAmt'], 'number'],
            [['from', 'objective'], 'string'],
            [['type', 'docDate', 'project', 'activity', 'useDate', 'chairMan', 'chairManPos'], 'string', 'max' => 45],
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
            'supplier_id' => 'Supplier ID',
            'type' => 'Type',
            'year' => 'Year',
            'docDate' => 'Doc Date',
            'from' => 'From',
            'project' => 'Project',
            'activity' => 'Activity',
            'useDate' => 'Use Date',
            'objective' => 'Objective',
            'buyAmt' => 'Buy Amt',
            'chairMan' => 'Chair Man',
            'chairManPos' => 'Chair Man Pos',
        ];
    }
}

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนคุมการจัดจ้าง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('สร้างเอกสารใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'doc_date',
            //'type',
            'plan',
            //'from',
            //'do:ntext',
            //'supplier_id',
            [
                'label' => 'ร้านค้า',
                'value' => 'supplier.name',
            ],
            [
                'label' => 'จำนวน',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDecimal($data->amt);
                }
            ],
            //'invoice_id',
            //'invoice_date',
            //'for:ntext',
            'advance_by',
            //'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

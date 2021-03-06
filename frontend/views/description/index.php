<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แก้ไขประเภทวัสดุ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Description', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('พิมพ์บัญชีวัสดุ', ['report'], ['class' => 'btn btn-success'])?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'document_id',
            'item',
            //'quantity',
            'unit',
            'unit_price',
            [
                'label' => 'ประเภทวัสดุ',
                'value' => function($model){
                    return $model->pSDGroup['Name'];
                }
            ],
            //'price',
            [
                'label' => 'ชนิดวัสดุ',
                'value' => function($model){
                    return $model->pSDType['Type_Name'];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Description Jjs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-jj-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Description Jj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'item',
            'quantity',
            'unit',
            'unit_price',
            //'price',
            //'documents_jj_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

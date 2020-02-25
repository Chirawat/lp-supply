<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Psd Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psd-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Psd Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Group_Id',
            'Type_Name',
            'Type_Unit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

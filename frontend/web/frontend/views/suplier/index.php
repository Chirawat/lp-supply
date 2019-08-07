<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suplier-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Suplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Name:ntext',
            'Addr:ntext',
            'Amphr:ntext',
            'Chw:ntext',
            //'TxReg:ntext',
            //'Phone:ntext',
            //'SupplierType',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

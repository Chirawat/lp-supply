<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doc Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-file-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Doc File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'supplier_id',
            'type',
            'year',
            'docDate',
            //'from:ntext',
            //'project',
            //'activity',
            //'useDate',
            //'objective:ntext',
            //'buyAmt',
            //'chairMan',
            //'chairManPos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

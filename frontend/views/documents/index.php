<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Documents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'doc_date',
            'type',
            'plan',
            //'from',
            //'do:ntext',
            'supplier_id',
            'amt',
            //'invoice_id',
            //'invoice_date',
            //'for:ntext',
            'advance_by',
            //'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

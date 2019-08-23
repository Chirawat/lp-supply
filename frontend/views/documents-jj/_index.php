<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนคุมการจัดจ้าง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-jj-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Documents Jj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'doc_date',
            'plan',
            'do:ntext',
            'supplier_id',
            //'amt',
            //'invoice_id',
            //'invoice_date',
            //'for:ntext',
            //'advance_by',
            //'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

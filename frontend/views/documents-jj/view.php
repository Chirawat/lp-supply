<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */

$this->title = $model->id . '-' . $model->plan;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนคุมการจัดซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="documents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('add description', ['description-jj/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('report', ['report-jj/document-jj-report', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('หน้าหลัก', ['index', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'doc_date',
            //'type',
            'plan',
            //'from',
            'do:ntext',
            //'supplier_id',
            [
                'label' => 'ร้านค้า',
                'value' => $model->supplier->name,
            ],
            [
                'label' => 'จำนวน',
                'value'=>  function($data) {
                    return \Yii::$app->formatter->asDecimal($data->amt);
                }
            ],
            'invoice_id',
            'invoice_date',
            'for:ntext',
            'advance_by',
            //'position',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            //'document_id',
            'item',
            'quantity',
            'unit',
            'unit_price',
            'price',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'description-jj'
            ],
        ],
    ]); ?>

    
    ราคารวม <?=array_sum(array_column($descriptions, 'price'))?>


</div>

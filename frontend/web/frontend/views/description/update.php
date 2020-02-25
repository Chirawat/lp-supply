<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Description */

$this->title = 'Update Description: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Descriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'PSD_Type_Id' => $model->PSD_Type_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="description-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PsdType */

$this->title = 'Update Psd Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Psd Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Group_Id' => $model->Group_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="psd-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

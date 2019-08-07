<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocFile */

$this->title = 'Update Doc File: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doc Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'supplier_id' => $model->supplier_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doc-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

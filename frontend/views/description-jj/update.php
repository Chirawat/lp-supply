<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DescriptionJj */

$this->title = 'Update Description Jj: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Description Jjs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="description-jj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PsdType */

$this->title = 'Create Psd Type';
$this->params['breadcrumbs'][] = ['label' => 'Psd Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psd-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

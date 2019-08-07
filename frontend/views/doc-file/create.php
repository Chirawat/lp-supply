<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocFile */

$this->title = 'Create Doc File';
$this->params['breadcrumbs'][] = ['label' => 'Doc Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

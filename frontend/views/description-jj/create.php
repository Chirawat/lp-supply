<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DescriptionJj */

$this->title = 'Create Description Jj';
$this->params['breadcrumbs'][] = ['label' => 'Description Jjs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-jj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

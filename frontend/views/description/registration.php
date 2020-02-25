<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Description */

$this->params['breadcrumbs'][] = ['label' => 'Descriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="description-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <ul>
    <?php foreach($model as $model_t):?>
        <li>
            <?=Html::a($model_t->Name, ['description/report', 'group_id' => $model_t->id])?>
        </li>
    <?php endforeach; ?>
    </ul>


</div>

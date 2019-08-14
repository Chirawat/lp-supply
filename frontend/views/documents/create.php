<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */

$this->title = 'สร้างเอกสารใหม่';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนคุมการจัดซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'suppliers' => $suppliers,
    ]) ?>

</div>

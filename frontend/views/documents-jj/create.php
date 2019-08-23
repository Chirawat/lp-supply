<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocumentsJj */

$this->title = 'สร้างเอกสารการจ้างใหม่';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนคุมการจัดจ้าง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-jj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Suplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'Name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Addr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Amphr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Chw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'TxReg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SupplierType')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

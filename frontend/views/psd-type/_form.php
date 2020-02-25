<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PsdType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="psd-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'Group_Id')->textInput() ?>

    <?= $form->field($model, 'Type_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type_Unit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

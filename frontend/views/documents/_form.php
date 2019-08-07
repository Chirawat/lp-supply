<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doc_date')->widget(\yii\jui\DatePicker::class, [
        'language' => 'th',
        'dateFormat' => 'dd-MM-yyyy',
    ]) ?>

    <?= $form->field($model, 'type')->dropDownList([
        'JS' => 'จัดซื้อ',
        'JJ' => 'จัดจ้าง',
    ]);?>

    <?= $form->field($model, 'plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'do')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'supplier')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => array_column($suppliers,'name'),
        ],
    ]) ?>

    <?= $form->field($model, 'amt')->textInput() ?>

    <?= $form->field($model, 'invoice_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'advance_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

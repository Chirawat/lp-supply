<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin([
        // 'options' => [
        //     'class' => 'form-inline'
        // ]
    ]); ?>
    
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'id')->textInput()?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'doc_date')->textInput()
            // widget(\yii\jui\DatePicker::class, [
            //     'language' => 'th',
            //     'dateFormat' => 'dd-MM-yyyy',
            //     'options' => [
            //         'class' => 'form-control'
            //     ]
            // ]) 
            ?>
        </div>
    </div>

    <div class="form-group">

        <?= $form->field($model, 'type')->dropDownList([
            'JS' => 'จัดซื้อ',
            'JJ' => 'จัดจ้าง',

        ]);?>

    </div>

    <?= $form->field($model, 'plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'do')->textInput() ?>

    <?= $form->field($model, 'supplier')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => array_column($suppliers,'name'),
        ],
        'options' => [
            'class' => 'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'amt')->textInput() ?>

    <?= $form->field($model, 'invoice_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advance_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

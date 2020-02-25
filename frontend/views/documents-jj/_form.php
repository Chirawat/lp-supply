<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use frontend\models\Supplier;
use yii\helpers\ArrayHelper;
$suppliers=Supplier::find()->all();


$listData=ArrayHelper::map($suppliers,'id','name');

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

    <div class="form-group">
        <!-- <?= $form->field($model, 'supplier')->dropDownList(
            $listData,
            ['prompt'=>'Select...']
        );?> -->


        <?= $form->field($model, 'supplier')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => array_column($suppliers,'name'),
        ],
        'options' => [
            'class' => 'form-control',
            'label' => 'ร้านค้า',
        ]
    ]) ?>
        <?= Html::a('เพิ่มร้านค้าใหม่', ['supplier/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'id')->textInput([
                'readonly' => true,
            ])?>
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

    <?= $form->field($model, 'plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'do')->textInput() ?>

    <?= $form->field($model, 'invoice_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amt')->textInput() ?>

    <?= $form->field($model, 'advance_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'doc_id') ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        <?= Html::a('ยกเลิก', ['index', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

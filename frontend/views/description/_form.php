<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use kartik\widgets\DepDrop;

use frontend\models\PsdType;
use frontend\models\PsdGroup;

/* @var $this yii\web\View */
/* @var $model frontend\models\Description */
/* @var $form yii\widgets\ActiveForm */

$psdType = PsdType::find()->all();
$listData = ArrayHelper::map($psdType, 'id', 'Type_Name');
$psdGroups = ArrayHelper::map(PsdGroup::find()->asArray()->all(), 'id', 'Name');

?>

<div class="description-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document_id')->textInput() ?>

    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'PSD_Group_Id')->dropdownList(
        $psdGroups,
        [
            'id'     =>  'dropDownGroup',
            'prompt' =>  'เลือกหมวดวัสดุ...'
        ]
    ) ?>

    <?= $form->field($model, 'PSD_Type_Id')->widget(DepDrop::classname(), [
            'options'=>['id'=>'dropDownType'],
            'data'=> [],
            'pluginOptions'=>[
                'depends'=>['dropDownGroup'],
                'placeholder'=>'เลือกชนิดวัสดุ...',
                'url'=>Url::to(['/psd-type/get-type'])
            ]
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


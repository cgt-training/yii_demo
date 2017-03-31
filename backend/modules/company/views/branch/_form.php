<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Company;
/* @var $this yii\web\View */
/* @var $model app\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'company_id')->dropDownList(
        ArrayHelper::map(Company::find()->all(),'company_id','company_name'),['prompt'=>'Select Company']) ?>

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_create_date')->textInput() ?>

    <?= $form->field($model, 'branch_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

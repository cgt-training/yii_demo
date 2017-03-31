<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AuthItem;
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'role')->dropDownList(
        ArrayHelper::map(AuthItem::find()->where(['type'=>'1'])->all(),'name','name'),['prompt'=>'Select Role']) ?>
        <?= $form->field($model, 'status')->dropDownList(["1"=>"Active","0"=>"Inactive"],['prompt'=>'User Status']) ?>
    <div class="form-group">
        <?= Html::submitButton("Submit", ['class' => 0 ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

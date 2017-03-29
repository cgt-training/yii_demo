<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Company;
use frontend\models\Branch;



/* @var $this yii\web\View */
/* @var $model frontend\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->dropDownList(
            ArrayHelper::map(Company::find()->all(),'company_id','company_name'),
            [
                'prompt'=>'Select Company',
                'onChange' => "populateBranch(this)"
            ]

        )?>
    
    <?= $form->field($model, 'branch_id')->dropDownList(
            [],
            [
                'prompt'=>'Select Department',
            

            ]) 
    ?>

    <?= $form->field($model, 'dept_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dept_create_date')->textInput() ?>

    <?= $form->field($model, 'dept_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




<script type="text/javascript">
    
    var  debugGlobal_1;

    function populateBranch(obj) {

        var value = obj.value;

        $.post("/yii_demo/branch/list?id="+value,function(data){

            $('#department-branch_id').html(data);

        });
    }


</script>
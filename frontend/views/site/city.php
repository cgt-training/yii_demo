<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\City */
/* @var $form ActiveForm */
?>
<div class="City">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'city_name') ?>
        <?= $form->field($model, 'city_population') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- City -->

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login"  style="max-width: 400px;margin:60px auto 0 auto;">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p class="text-center">Please fill out the following fields to login:</p>

    <?php
        if($formMessage && !is_array($formMessage)){
            echo '<div class="alert alert-danger"><button type="button" aria-hidden="true" class="close">×</button><span><b> Error - </b>'.$formMessage.'</span></div>';               
        }
    ?>

    <?php if($formMessage && is_array($formMessage)){ ?>

        <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close">×</button>
            <span><b> Error - </b>

            <?php 
                foreach ($formMessage as $keyA => $valueA) {
                    foreach ($valueA as $keyB => $valueB) {
                        echo "</br> >> ".$valueB;    
                    }
                }
            ?>
            </span>
        </div>

    <?php  } ?>





    <div class="row">
        <div class="col-md-12">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username',[
        'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
        ])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email',[
        'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
        ]) ?>

            <?= $form->field($model, 'password',[
        'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
        ])->passwordInput() ?>

        <p style="margin: 10px 0;">Or <?= Html::a('Already Have Account ?', ['/site/login'], ['class'=>'']) ?></p>

            <div class="form-group text-center">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

         </div>
    </div>
</div>

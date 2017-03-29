<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-login"  style="max-width: 400px;margin:60px auto 0 auto;">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p class="text-center">Please fill out the following fields to login:</p>

    <?php
        if($formMessage){
            echo '<div class="alert alert-danger"><button type="button" aria-hidden="true" class="close">×</button><span><b> Error - </b>'.$formMessage.'</span></div>';               
        }
    ?>
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username',[
                    'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
                    ])->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password',[
                    'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
                ])->passwordInput() ?>
                

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                or

                Or <?= Html::a('Create New Account', ['/site/signup'], ['class'=>'']) ?>

                <div class="form-group text-center" >
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
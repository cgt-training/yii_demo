<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12 text-center">
        <div class="card text-left" style="max-width: 400px; margin:80px auto;;">

            <div class="card-header" data-background-color="purple">
                <h4 class="title"><?= Html::encode($this->title) ?></h4>
                <p class="category">Complete <?=$this->title?> Form</p>
            </div>

            <div class="card-content">
                <?php
                    if($formMessage){
                        echo '<div class="alert alert-danger"><button type="button" aria-hidden="true" class="close">×</button><span><b> Error - </b>'.$formMessage.'</span></div>';               
                    }
                ?>
                 <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username',[
                        'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
                        ])->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password',[
                        'template' => "<div class='form-group label-floating'>{label}{input}\n{hint}\n{error}</div>"
                    ])->passwordInput() ?>
                    
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>   

                    Or <?= Html::a('Create New Account', ['/site/signup'], ['class'=>'']) ?>

                    <div class="form-group text-center" >
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>                 
            </div>
        </div>
    </div>
</div>




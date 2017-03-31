<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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
</div>
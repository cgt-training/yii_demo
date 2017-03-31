<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */
/* @var $form ActiveForm */
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
				<div class="card text-left" style="max-width: 600px; margin: auto;;">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><?= Html::encode($this->title) ?></h4>
						<p class="category">Complete <?=$this->title?> Form</p>
                    </div>


                    <div class="card-content">
	                    <div class="Auth">

 
				<?php $form = ActiveForm::begin(); ?>





				<?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(AuthItem::find()->where(['type'=>'1'])->all(),'name','name'),['prompt'=>'Select Role']) ?>

				<?= $form->field($model, 'child')->dropDownList(ArrayHelper::map(AuthItem::find()->where(['type'=>'2'])->all(),'name','name'),['prompt'=>'Select Permission']) ?>



				<?php if(false){ ?>


			<?= $form->field($model, 'child',["options"=>['tag'=>'div','class'=>'checkbox']])->checkboxlist(			    	ArrayHelper::map(AuthItem::find()->where(['type'=>'2'])->all(),'name','name'),[
						    		'prompt'=>'Select Permission',
						    		'item' =>
						                function ($index, $label, $name, $checked, $value) {

											$checkbox = Html::checkbox($name, $checked, ['value' => $value]);
											return Html::tag('div', Html::label($checkbox . $label), ['class' => 'checkbox']);
						                },
						          
						            'separator'=>false,
						    	]) ?>

							<?php }?>

			  
		    		 



			    <div class="form-group">
			        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			    </div>
			<?php ActiveForm::end(); ?>



						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



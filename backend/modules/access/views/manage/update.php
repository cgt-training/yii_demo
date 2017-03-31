<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = 'Update Auth Item: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Update';
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
	                    <div class="auth-item-update">
						    <?= $this->render('_form', ['model' => $model,]) ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
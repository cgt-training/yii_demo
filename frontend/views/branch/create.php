<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Branch */

$this->title = 'Create Branch';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


//gcm($model->find());

//prd($model->find()->orderBy('branch_name')->all());



?>
<div class="branch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

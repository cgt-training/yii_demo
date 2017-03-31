<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Branch */

$this->title = $model->branch_name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card text-left" style="max-width: 600px; margin: auto;;">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><?= Html::encode($this->title) ?></h4>
                        <p class="category">Manage <?=$this->title?> Information</p>
                    </div>
                    <div class="card-content">
                        <div class="branch-view">
                            <p>
                                <?= Html::a('Update', ['update', 'id' => $model->branch_id], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $model->branch_id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'branch_id',
                                    'company_id',
                                    'branch_name',
                                    'branch_address',
                                    'branch_create_date',
                                    'branch_status',
                                ],
                            ]) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

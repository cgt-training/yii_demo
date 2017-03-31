<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
                        <div class="company-view">
                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                                    'id',
                                    'username',
                                    'auth_key',
                                    'password_hash',
                                    'password_reset_token',
                                    'email:email',
                                    'status',
                                    'created_at',
                                    'updated_at',
                                ],
                            ]) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><?= Html::encode($this->title) ?></h4>
                        <p class="category">List of All <?= Html::encode($this->title) ?></p>
                    </div>      

                    <div class="card-content table-responsive">

                        <?php if(Yii::$app->session->hasFlash('warning')){ ?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><b> Warning - </b>  <?= Yii::$app->session->getFlash('warning');?> </span>
                            </div>    
                        <?php } ?>

                        <p><?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?></p>

                        

                        <?php Pjax::begin(); ?>    
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'id',
                                    'username',
                                    'role',
                                    'auth_key',
                                    //'password_hash',
                                    //'password_reset_token',
                                     'email:email',
                                     'status',
                                     'created_at',
                                     'updated_at',

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>



                    <?php Pjax::end(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Companies';
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

                        <?php if(Yii::$app->session->hasFlash('Warning')){ ?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><b> Warning - </b>  <?= Yii::$app->session->getFlash('warning');?> </span>
                            </div>    
                        <?php } ?>

                        <p><?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?></p>

                        <?php Pjax::begin(); ?>    

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'company_id',
                                'company_name',
                                'company_email:email',
                                'company_address',
                                'company_create_date',
                                // 'company_status',
                                // 'registration_date',
                                // 'logo',

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

 
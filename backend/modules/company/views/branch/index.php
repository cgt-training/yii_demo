<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Branches';
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

                        <p><?= Html::a('Create Branch', ['create'], ['class' => 'btn btn-success']) ?></p>

                        <?php Pjax::begin(); ?>    

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                //['class' => 'yii\grid\SerialColumn'],

                                ['attribute'=>'branch_id','value'=>'branch_id'],
                                ['attribute'=>'company_name','value'=>'company.company_name'],
                                'branch_name',
                                'branch_address',
                                'branch_create_date',
                                 'branch_status',

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



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

                        <?php if(Yii::$app->session->hasFlash('warning')){ ?>
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
                            //'summary' => "{begin} - {end} ({count}) {totalCount} {page} {pageCount}",
                            'layout'=>"{items}\n<div class=\"pull-left\" style=\"margin:20px 0;\">{summary}</div><div class=\"pull-right\">{pager}</div>",
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'company_id',
                                'company_name',
                                'company_email:email',
                                'company_address',
                                'company_create_date',
/*
                                [
                                    'value' => function($value){
                                        echo $value;

                                        
                                        //prd($value->company_create_date);

                                    },
                                    'attribute' => 'company_create_date',

                                ],*/





                                // 'company_status',
                                // 'registration_date',
                                // 'logo',
                                /*[
                                    'attribute' => 'company_status',
                                    'value' => 'company_status',
                                    'filter' => '<select class="form-control"><option value="Action">Active</option><option  value="Inactive">Inactive</option></select>',
                                    
                                ],*/

                               /* [
                                    'class' => 'yii\grid\ActionColumn',
                                    'visible' => true,
                                    'template' => '<p style="width:60px;">{view} {update} {delete}</p>',
                                

                                ],*/

                               /* [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{hello} {view} {update} {delete}',
                                'buttons' => [
                                    'view' => function ($url) {

                                             
                                        return Html::a(
                                            '<i class="">visibility</span>',
                                            $url, 
                                            [
                                                'title' => 'Download',
                                                'data-pjax' => '0',
                                            ]
                                        );
                                    },
                                ],
                            ],*/


                                [
                                 'class' => 'yii\grid\ActionColumn',
                                 'template'=>'<div style="width:80px;">{view} {update} {delete}</div>',
                                 'header'=>'Edit',
                                 'buttons' => [
                                        'view' => function($url){return Html::a('<i class="material-icons">visibility</i>',$url,['onClick'=>"alert('Helo');"]);},
                                        'update' => function($url){return Html::a('<i class="material-icons">mode_edit</i>',$url);},
                                        '1delete' => function($url){return Html::a('<i class="material-icons">delete</i>',$url);},
                                 ],
                            ]
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
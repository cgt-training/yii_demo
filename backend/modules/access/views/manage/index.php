<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Items';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Roles With Permissions</h4>
                        <p class="category">List of available Permissions</p>
                    </div>      

                    <div class="card-content table-responsive">


                        <table class="table">
                            <thead class="text-primary">
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach($rolePermissions as $key=>$value){
                                    $permissions = explode(",",$value['all_permissions']);
                                    ?>

                                    <tr>
                                        <td><?=$value['name']?></td>
                                        <td>
                                            <ul>
                                                <?php foreach ($permissions as $permission){
                                                        echo "<li>".$permission."</li>";   
                                                }
                                                ?>
                                            </ul>
                                        </td>
                                         <td><a>Update</a></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Role Permissions</h4>
                        <p class="category">List of all roles with respective permissions</p>
                    </div>      

                    <div class="card-content table-responsive">

                        <?php if(Yii::$app->session->hasFlash('warning')){ ?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><b> Warning - </b>  <?= Yii::$app->session->getFlash('warning');?> </span>
                            </div>    
                        <?php } ?>

                        <p><?= Html::a('Create New Role', ['role-permissions'], ['class' => 'btn btn-success']) ?></p>

                        <?php Pjax::begin(); ?>    

                         <?php Pjax::begin(); ?>    <?= GridView::widget([
                                'dataProvider' => $dataProvider_role,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn','header'=>"S.No"],
                                    ['attribute'=>"name",'value'=>function($row){
                                        return preg_replace('/(?<!^)([A-Z])/', ' \\1', $row->name);
                                    }],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{view}','header' => 'View'],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{update}','header' => 'Update'],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{delete}','header' => 'Delete'],
                                ],
                            ]); ?>
                    <?php Pjax::end(); ?>
                        
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>




<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Roles</h4>
                        <p class="category">List of available roles</p>
                    </div>      

                    <div class="card-content table-responsive">

                        <?php if(Yii::$app->session->hasFlash('warning')){ ?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><b> Warning - </b>  <?= Yii::$app->session->getFlash('warning');?> </span>
                            </div>    
                        <?php } ?>

                        <p><?= Html::a('Create New Role', ['create'], ['class' => 'btn btn-success']) ?></p>

                        <?php Pjax::begin(); ?>    

                         <?php Pjax::begin(); ?>    <?= GridView::widget([
                                'dataProvider' => $dataProvider_role,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn','header'=>"S.No"],
                                    ['attribute'=>"name",'value'=>function($row){
                                        return preg_replace('/(?<!^)([A-Z])/', ' \\1', $row->name);
                                    }],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{view}','header' => 'View'],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{update}','header' => 'Update'],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{delete}','header' => 'Delete'],
                                ],
                            ]); ?>
                    <?php Pjax::end(); ?>
                        
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>






<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Permissions</h4>
                        <p class="category">List of available Permissions</p>
                    </div>      

                    <div class="card-content table-responsive">

                        <?php if(Yii::$app->session->hasFlash('warning')){ ?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><b> Warning - </b>  <?= Yii::$app->session->getFlash('warning');?> </span>
                            </div>    
                        <?php } ?>

                        <?php Pjax::begin(); ?>    

                         <?php Pjax::begin(); ?>    <?= GridView::widget([
                                'dataProvider' => $dataProvider_permission,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn','header'=>"S.No"],
                                    ['attribute'=>"name",'value'=>function($row){
                                        return preg_replace('/(?<!^)([A-Z])/', ' \\1', $row->name);
                                    }],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{view}','header' => 'View'],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{update}','header' => 'Update'],
                                    ['class' => 'yii\grid\ActionColumn','template'=>'{delete}','header' => 'Delete'],
                                ],
                            ]); ?>
                    <?php Pjax::end(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

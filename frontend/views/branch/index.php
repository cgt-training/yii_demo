<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Create Branch', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php Pjax::begin(); ?>    

        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'branch_id',
                    ['attribute' => 'company_name','value' => 'company.company_name'],
                    'branch_name',
                    'branch_address',
                    'branch_create_date',
                    //'branch_status',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
    <?php Pjax::end(); ?>
</div>

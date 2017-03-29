<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>

<div class="sidebar" data-color="purple" data-image="<?=Yii::getAlias('@web');?>/img/sidebar-1.jpg">

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">Creative Tim</a>
    </div>

    <?php

    NavBar::begin([
        'renderInnerContainer'=>false,
        'options' =>[ 'class'=>"sidebar-wrapper"]
    ]);

    $menuItems = [
        ['label' => '<i class="material-icons">dashboard</i><p>Dashboard</p>','encode' => false,'url' => ['site/index']],
        ['label' => '<i class="material-icons">group</i><p>All Users</p>','encode' => false,'url' => ['site/users']],
        
        ['label' => '<i class="material-icons">domain</i><p>Companies </p>','encode' => false,'url' => ['/company'],
            'active' => in_array(\Yii::$app->controller->id,['company'])],
        ['label' => '<i class="material-icons">my_location</i><p>Branches</p>','encode' => false,'url' => ['/branch'],'active' => in_array(\Yii::$app->controller->id,['branch'])],
        ['label' => '<i class="material-icons">language</i><p>Departments</p>','encode' => false,'url' => ['/department'],'active' => in_array(\Yii::$app->controller->id,['department'])],



        ['label' => '<i class="material-icons">person</i><p>User Profile</p>','encode' => false,'url' => ['site/profile']],
        ['label' => '<i class="material-icons">content_paste</i><p>Table List</p>','encode' => false,'url' => ['site/table']],
        ['label' => '<i class="material-icons text-gray">notifications</i><p>Notifications</p>','encode' => false,'url' => ['site/notifications']],

        ['label' => '<i class="material-icons text-gray">power_settings_new</i><p>Logout ('.Yii::$app->user->getIdentity()->username.')</p>','encode' => false,'url' => ['site/logout']]
    ];

    if (Yii::$app->user->isGuest) {

    }

    echo Nav::widget([
        'options' => ['class'=>'nav'],
        'items' => $menuItems,
    ]);
 
    NavBar::end();
?>
</div>
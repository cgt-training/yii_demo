<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
        <div class="wrapper">
            <?= Yii::$app->controller->renderPartial("//layouts/_sideBar");?>
            <div class="main-panel">       
                <?= Yii::$app->controller->renderPartial("//layouts/_nav");?>
                 <?= $content ?>
                 <?= Yii::$app->controller->renderPartial("//layouts/_footer");?>    
            </div>
        </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
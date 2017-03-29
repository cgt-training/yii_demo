<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
        <div class="wrapper">
             <?= $content ?>
        </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
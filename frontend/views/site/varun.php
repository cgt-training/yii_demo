<?php

/* @var $this yii\web\View */

//$this->title = 'Hello Varun';

?>


<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            

             <ul class="list-unstyled">
                <?php  foreach ( $myValue as $key => $value) {

                    echo '<li class="col-md-4">'.$value.'</li>';
                    


                } ?>

             </ul>

        </div>

    </div>
</div>

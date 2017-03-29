<?php

function prd($string){
	pr($string);
	exit();
}


function pr($string=""){
	echo "<pre>";
	print_r($string);
	echo "</pre>";
}


function gcm($class){
	pr(get_class_methods($class));
}
function gcmd($class){
	gcm($class);
	exit();
}

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
         'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];

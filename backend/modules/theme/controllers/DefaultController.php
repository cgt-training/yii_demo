<?php

namespace backend\modules\theme\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Default controller for the `theme` module
 */
class DefaultController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'roles' => ['@'],
                        'allow' => true
                        
                    ]
                ],
            ]
        ];
    }


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionTypography()
    {
        return $this->render('typography');
    }


    public function actionProfile()
    {
        return $this->render('profile');
    }


    public function actionTable()
    {
        return $this->render('table');
    }

    public function actionIcons()
    {
        return $this->render('icons');
    }


    public function actionMaps()
    {
        return $this->render('maps');
    }

    public function actionNotifications()
    {
        return $this->render('notifications');
    }
}
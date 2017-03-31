<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\SignupForm;

use frontend\models\CompanySearch;
use frontend\models\BranchSearch;
use frontend\models\DepartmentSearch;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        $this->view->title = ucwords(Yii::$app->controller->action->id) ;

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        'actions' => ['login','signup' ,'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout',
                             'index',
                         ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],


            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

     
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = "Dashboard";
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {


         $this->layout = 'guest.php';


        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if(Yii::$app->request->post()){
        
            if($model->load(Yii::$app->request->post()) && $model->login()){
                return $this->goBack();
            }else{
                $message = "Please check username and password!";
            }
        }else{
            $message = false;
        }      

        return $this->render('login', [
                'model' => $model,
                'formMessage' => $message,
            ]);
    }



    public function actionSignup()
    {

        $this->layout = 'guest';

        $model = new SignupForm();
        $formMessage = false;

        if(Yii::$app->request->post()){
            if($model->load(Yii::$app->request->post()) && $user = $model->signup()){
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }else{
                    $formMessage = "something Went Worng ! Please check again";
                }
            }else{
                    $formMessage = $model->getErrors();
            }
        }
        return $this->render('signup', [
            'model' => $model,
            'formMessage'=> $formMessage
        ]);
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
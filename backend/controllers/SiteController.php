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
                             'profile',
                             'table',
                             'typography',
                             'icons',
                             'maps',
                             'notifications',
                             'users',
                             'company',
                             'department',
                             'branch',
                             'user',
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


   
    public function actionError(){



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

    public function actionUsers()
    {

         $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('users', [
            'model' => $model,
        ]);


    }



    public function actionCity()
    {

        $model = new frontend\models\City();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('City', [
            'model' => $model,
        ]);
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
    


    /*    if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }


        prd($model->getErrors());

*/
        return $this->render('signup', [
            'model' => $model,
            'formMessage'=> $formMessage
        ]);
    }




    /*  -- All-- Backup (Before GII Creation)  */

    public function actionCompany(){
        return $this->render('company',[
            'model' => new CompanySearch()
            ]);
    }

    public function actionBranch(){
        return $this->render('branch',[
            'model' => new BranchSearch()
            ]);
    }

    public function actionDepartment(){
        return $this->render('department',[
            'model' => new DepartmentSearch()
            ]);
    }

    public function actionUser(){
        return $this->render('user',[
            'model' => new User()
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

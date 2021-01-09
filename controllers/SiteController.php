<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Pets;
use app\models\Types;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $pets= Pets::find()->all();
        $types= Types::find()->all();
        return $this->render('home',['pets' => $pets, 'types'=>$types]);
    }

    /**
     *
     * Create function 
     */

    public function actionCreate()
    {
        $pet = new Pets();
        $type= new Types();
        $formData=Yii::$app->request->post();
        if($pet->load($formData)|| $type->load($formData)){
            if($pet->save()||$type->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Successfully');
                return $this->redirect(['index']);
            }else{
                Yii::$app->getSession()->setFlash('message','Failed');
            }
        }
        
        return $this->render('create',['pet'=>$pet,'type'=>$type]);
    }

    public function actionView($id_pets)
    {   
        $pet=Pets::findOne($id_pets);
        return $this->render('view',['pet'=>$pet]);
    }

    public function actionUpdate($id_pets)
    {
        $pet=Pets::findOne($id_pets);
        if($pet->load(Yii::$app->request->post()) && $pet->save() )
        {
            Yii::$app->getSession()->setFlash('message','Post Updated');
            return $this->redirect(['index','id'=>$pet->id_pets]);
        }else{
            return $this->render('update',['pet'=>$pet]);
        }
    }
    
    public function actionDelete($id_pets)
    {
        $pet=Pets::findOne($id_pets)->delete();
        if($pet)
        {
            Yii::$app->getSession()->setFlash('message','Post Deleted Successfully');
            return $this->redirect(['index']);
        }
    }






    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

<?php
namespace iplme\controllers;


use common\models\IpSwiper;
use common\widgets\PublicFunctionUnion;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use iplme\models\AdminLoginForm;


/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['index', 'error','test','about','langue'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [],
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



    public $prix = '';

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $langue = Yii::$app->session['langue']?Yii::$app->session['langue']:'fr';

        if ($langue=='fr'){
            $this->prix = '';
        }else{
            $this->prix = '_zh';
        }

        $this->layout = 'main'.$this->prix;


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
        $datas = IpSwiper::find()->all();
        return $this->render('index'.$this->prix,[
            'datas'=>$datas
        ]);
    }


    public function actionTest(){

    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login'.$this->prix, [
                'model' => $model,
            ]);
        }
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


    public function actionAbout(){
        return $this->render('about');
    }


    public function actionLangue(){
        $langue = Yii::$app->session['langue']?Yii::$app->session['langue']:"fr";
        if ($langue=="fr"){
            Yii::$app->session['langue'] = 'zh';
        }else if ($langue=="zh"){
            Yii::$app->session['langue'] = 'fr';
        }

        return $this->goHome();
    }
}

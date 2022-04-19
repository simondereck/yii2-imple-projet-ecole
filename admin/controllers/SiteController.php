<?php
namespace admin\controllers;

use admin\models\AdminAccessControl;
use common\models\Admin;
use common\widgets\PublicFunctionUnion;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use admin\models\AdminLoginForm;

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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','contact'
                            ,'langue', 'updatehot','deletehot','sendmail'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }



    public $layout = "admin";
    public $prix = "";
    public function actions()
    {

        $langue = Yii::$app->session['langue']?Yii::$app->session['langue']:'fr';

        if ($langue=='fr'){
            $this->prix = '';
        }else{
            $this->prix = '_zh';
        }


        if (AdminAccessControl::getIsStudent()){
            $this->layout = "student".$this->prix;
        }else if (AdminAccessControl::getIsProfesseur()){
            $this->layout = "professeur".$this->prix;
        }
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
//        PublicFunctionUnion::printData($this->layout);
        return $this->render('index');
    }



    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        $this->layout = "login";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity['types']==Admin::USER_ADMIN){
                return $this->goBack();
            }else if (Yii::$app->user->identity['types']==Admin::USER_PROFESSEUR){
                return $this->redirect('index.php?r=site/index');

            }else if (Yii::$app->user->identity['types']==Admin::USER_STUDENT){
                return $this->redirect('index.php?r=site/index');
            }
        } else {
            return $this->render('login', [
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


    public function actionLangue(){
        $langue = Yii::$app->session['langue']?Yii::$app->session['langue']:"fr";
        if ($langue=="fr"){
            Yii::$app->session['langue'] = 'zh';
        }else if ($langue=="zh"){
            Yii::$app->session['langue'] = 'fr';
        }
        return $this->redirect('index.php?r=site/index');
    }


    public function actionSendmail(){
        $mail = Yii::$app->mailer->compose();
        $mail->setTo("513881204@163.com");
        $mail->setSubject("邮件测试");
        $mail->setTextBody("sending email from test by iplme bussiness school!");//发布纯文字文本
        //$mail->setHtmlBody("htmlbody");//发布可以带html标签的文本
        if($mail->send()){
             echo "success";
        }else{
             echo "failure";

        }
    }

    public function actionContact(){
        return $this->render('contact');
    }
}

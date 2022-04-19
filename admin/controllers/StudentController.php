<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/12/2019
 * Time: 23:01
 */

namespace admin\controllers;

use Codeception\Module\PhpBrowser;
use common\models\CoursProgram;
use common\models\Demander;
use common\models\IpCoursStudents;
use common\widgets\ArrayDatas;
use common\widgets\PublicFunctionUnion;
use Symfony\Component\DomCrawler\Tests\Field\InputFormFieldTest;
use yii\filters\AccessControl;
use yii\web\Controller;
use admin\models\AdminAccessControl;
use Yii;
use yii\helpers\Json;

class StudentController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','mon_cours','create_cours'],
                        'allow' => true,
                        'matchCallback'=>function(){
                            return AdminAccessControl::getIsStudent();
                        }
                    ],
                ],
            ],
        ];
    }


    public $prix = '';

    public function actions()
    {
        $langue = Yii::$app->session['langue']?Yii::$app->session['langue']:'fr';

        if ($langue=='fr'){
            $this->prix = '';
        }else{
            $this->prix = '_zh';
        }

        $this->layout = 'student'.$this->prix;


        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex(){

        return $this->render('index');
    }

    public function actionMon_cours(){
        $id = Yii::$app->user->getId();
        $document = Demander::findOne(['uid'=>$id,'status'=>1]);
        if ($document) {
            $cours = IpCoursStudents::findOne([
                'sid' => $id,
                'year' => $document->year,
                'faculty'=>$document->faculty,
                'session'=>$document->session]);
            if ($cours) {
                return $this->render('mon_cours', [
                    'cours' => $cours
                ]);
            } else {
                return $this->redirect('index.php?r=student/create_cours');
            }
        }else{
            return $this->redirect('index.php?r=site/index');
        }

    }


    public function actionCreate_cours(){
        $id = Yii::$app->user->getId();
        $document = Demander::findOne(['uid'=>$id,'status'=>1]);
        if ($document){
            $coursProgram = CoursProgram::findOne([
                'year'=>$document->year,
                'faculty'=>$document->faculty,
                'session'=>$document->session,
            ]);
            if ($coursProgram){
                if (Yii::$app->request->post()){
                    $optData = Json::decode($coursProgram->opt,true);
                    if ($coursProgram->load(Yii::$app->request->post())){
                        $optSave = [];
                        $temp =Yii::$app->request->post()["CoursProgram"]['opt'];
                        if (count($temp)>0){
                            foreach ($temp as $key=>$value){
                                if (isset($optData[$key])){
                                    $optSave[$key] = $optData[$key];
                                }
                            }
                        }

                        $ipCourStudents = new IpCoursStudents();
                        $ipCourStudents->year = $document->year;
                        $ipCourStudents->faculty = $document->faculty;
                        $ipCourStudents->session = $document->session;
                        $ipCourStudents->sid = Yii::$app->user->getId();
                        $ipCourStudents->ctime = PublicFunctionUnion::getTimeString();
                        $ipCourStudents->cours = Json::encode(['ness'=>Json::decode($coursProgram->ness,true),'opt'=>$optSave]);
                        $ipCourStudents->status = 0;
                        if ($ipCourStudents->save()){
                            return $this->redirect('index.php?r=student/mon_cours');
                        }
                    }

                }

                return $this->render('create_cours',[
                    'program'=>$coursProgram
                ]);
            }
            return $this->redirect('index.php?r=student/index');

        }else{
            return $this->redirect('index.php?r=student/index');
        }
    }
}

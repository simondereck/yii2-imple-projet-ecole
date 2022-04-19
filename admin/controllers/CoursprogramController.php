<?php

namespace admin\controllers;

use admin\models\AdminAccessControl;
use common\models\Cours;
use common\models\CoursProgram;
use common\models\Demander;
use common\models\searchForm\CoursprogramSearchForm;
use common\models\searchForm\IpCoursStudentSearchForm;
use yii\web\Controller;
use common\widgets\PublicFunctionUnion;
use Yii;
use yii\filters\AccessControl;
use common\models\searchForm\DemanderSearchForm;
use common\models\IpCoursStudents;

class CoursprogramController extends Controller
{

    public $layout = "admin";


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create_coursprogram','delete_cours_program','update_cours_program','student'
                            ,'view_cours','delete_cours','choix_cours_program'
                        ],
                        'allow' => true,
                        'matchCallback'=>function(){
                            return AdminAccessControl::getIsSuperAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(){

        $searchModel = new CoursprogramSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);

    }

    public function actionCreate_coursprogram(){
        $model = new CoursProgram();
        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $coursName = Cours::find()->all();
            $nesses = Yii::$app->request->post("CoursProgram")["ness"];
            $opts = Yii::$app->request->post("CoursProgram")["opt"];
            $model->ness = '';
            $model->opt = '';

            $coursNameArray = [];
            $coursId = [];
            foreach ($coursName as $record){
                $coursNameArray[$record->id] = $record->name;
            }
            foreach ($nesses as $key => $value) {
                $nessesArray[$coursNameArray[$value]]['score'] = 1;
                $nessesArray[$coursNameArray[$value]]['id'] = $value;

            }
            foreach ($opts as $key => $value) {
                $optsArray[$coursNameArray[$value]]['score']= 1;
                $optsArray[$coursNameArray[$value]]['id']= $value;

            }

            $model->ness = json_encode($nessesArray, JSON_UNESCAPED_UNICODE);
            $model->opt = json_encode($optsArray, JSON_UNESCAPED_UNICODE);
            $model->ctime = PublicFunctionUnion::getTimeString();

            if ($model->save()){
                return $this->redirect('index.php?r=coursprogram/index');
            }

        }

        return $this->render('createCoursprogram',[
            'model'=>$model
        ]);
    }

    public function actionDelete_cours_program($id){

        $model = CoursProgram::findOne(["id"=>$id]);
        $model->delete();

        return $this->redirect("index.php?r=coursprogram/index");
    }



    public function actionUpdate_cours_program($id){
        $model = CoursProgram::findOne(["id"=>$id]);

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $nesses = json_decode($model->ness, true);
            $opts = json_decode($model->opt, true);
            $nessesNote = Yii::$app->request->post("CoursProgram")["nessnote"];
            $optsNote = Yii::$app->request->post("CoursProgram")["optnote"];

            $indexNess = $indexOpt = 0;
            foreach ($nesses as $key => $value) {
                if (!is_array($value)){
                    $nesses[$key] = array();
                }
                $nesses[$key]['score'] = $nessesNote[$indexNess];
                $indexNess ++ ;

            }

            foreach ($opts as $key => $value) {
                if (!is_array($value)){
                    $opts[$key] = array();
                }
                $opts[$key]['score'] = $optsNote[$indexOpt];

                $indexOpt++;

            }


            $model->ness = json_encode($nesses, JSON_UNESCAPED_UNICODE);
            $model->opt = json_encode($opts, JSON_UNESCAPED_UNICODE);
            $model->ctime = PublicFunctionUnion::getTimeString();

            if ($model->save()){
                return $this->redirect("index.php?r=coursprogram/index");
            } else {
                return $this->redirect("index.php?r=coursprogram/index");

            }
        }

        return $this->render("updateCoursprogram",[
            "model"=>$model
        ]);

    }

    public function actionChoix_cours_program($id){
        $model = CoursProgram::findOne(["id"=>$id]);

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $coursName = Cours::find()->all();
            $nesses = Yii::$app->request->post("CoursProgram")["ness"];
            $opts = Yii::$app->request->post("CoursProgram")["opt"];
            $model->ness = '';
            $model->opt = '';

            $coursNameArray = [];
            $coursId = [];
            foreach ($coursName as $record){
                $coursNameArray[$record->id] = $record->name;
            }
            foreach ($nesses as $key => $value) {
                $nessesArray[$coursNameArray[$value]]['score'] = 1;
                $nessesArray[$coursNameArray[$value]]['id'] = $value;

            }
            foreach ($opts as $key => $value) {
                $optsArray[$coursNameArray[$value]]['score']= 1;
                $optsArray[$coursNameArray[$value]]['id']= $value;

            }

            $model->ness = json_encode($nessesArray, JSON_UNESCAPED_UNICODE);
            $model->opt = json_encode($optsArray, JSON_UNESCAPED_UNICODE);
            $model->ctime = PublicFunctionUnion::getTimeString();

            if ($model->save()){
                return $this->redirect('index.php?r=coursprogram/index');
            }

        }

        return $this->render("choix_cours_program",[
            "model"=>$model
        ]);
    }

    public function actionStudent(){
        $searchModel = new IpCoursStudentSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('student',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }


    public function actionView_cours($id){
        $cours = IpCoursStudents::findOne(["id"=>$id]);
        $document = Demander::findOne(['uid'=>$cours->sid,'status'=>1]);
        if ($document) {
            $cours = IpCoursStudents::findOne([
                'sid' => $document->uid,
                'year' => $document->year,
                'faculty'=>$document->faculty,
                'session'=>$document->session]);

            if (Yii::$app->request->post()){
                $cours->status = 1;
                $cours->save();
                return $this->redirect('index.php?r=coursprogram/student');
            }

            if ($cours) {
                return $this->render('view_cours', [
                    'isCours'=>true,
                    'cours' => $cours,
                    'document'=>$document
                ]);
            } else {
                return $this->render('view_cours',[
                    'isCours'=>false,
                    'message'=>'还没有选择课程',
                ]);
            }
        }else{
            return $this->render('view_cours',[
                'isCours'=>false,
                'message'=>'没有注册信息',
            ]);
        }

    }

    public function actionDelete_cours($id){
        $cours = IpCoursStudents::findOne([
                'id' =>$id,
           ]);
        if($cours){
            $cours->delete();

        }
        return $this->redirect('index.php?r=coursprogram/student');

    }

}

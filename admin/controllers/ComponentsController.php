<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/12/2019
 * Time: 16:10
 */

namespace admin\controllers;


use admin\models\AdminAccessControl;
use common\models\Cours;
use common\models\Demander;
use common\models\IpCourseWare;
use common\models\IpCourseWareDetail;
use common\models\IpDemanderFle;
use common\models\searchForm\CourseWareDetailSearchForm;
use common\models\searchForm\CourseWareSearchForm;
use common\widgets\PublicFunctionUnion;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use yii\web\UploadedFile;
use common\models\IpCoursStudents;

class ComponentsController extends Controller
{

    public $layout = "admin";


    public function actions()
    {
        if (AdminAccessControl::getIsStudent()){
            $this->layout = "student";
        }else if (AdminAccessControl::getIsProfesseur()){
            $this->layout = "professeur";
        }

        return [
            'uploadPhoto' => [
                'class' => 'budyaga\cropper\actions\UploadAction',
//                'url' => Yii::$app->params['domain'].'/ilproject/uploads/documents/',
                'url' => Yii::$app->params['domain'].'/uploads/documents/',
                'path' => '@uploads/documents/',
            ]
        ];

    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create_course_ware','uploadimage','uploadPhoto',
                            'update_course_ware',
                            'course_ware_detail_list','add_course_ware_detail','delete_course_ware_detail',
                            'update_course_ware_detail'
                        ],
                        'allow' => true,
                        'matchCallback'=>function(){
                            return AdminAccessControl::getIsAdmin();
                        }
                    ],
                    [
                        'actions' => ['telecharger','inscription','detail','download'],
                        'allow' => true,
                        'matchCallback'=>function(){
                            return AdminAccessControl::getIsStudent();
                        }
                    ],
                ],
            ],
        ];
    }


    public function actionInscription(){
        if (Yii::$app->user->identity["types"]===2){
            $inscription = Demander::findOne(["status"=>1,"uid"=>Yii::$app->user->getId()]);
            if ($inscription){
                return $this->render('mon_inscription',['model'=>$inscription]);
            }
        }else if(Yii::$app->user->identity["types"]===3){
            $inscription = IpDemanderFle::findOne(["status"=>1,"uid"=>Yii::$app->user->getId()]);
            if ($inscription){
                return $this->render('mon_inscription',['model'=>$inscription]);
            }
        }


        return $this->redirect('../../iplme/web/index.php?r=inscription/index');
    }

    public function actionTelecharger(){

        $id = Yii::$app->user->getId();
        $document = Demander::findOne(['uid'=>$id,'status'=>1]);
        if ($document) {
            $cours = IpCoursStudents::findOne([
                'sid' => $id,
                'year' => $document->year,
                'faculty'=>$document->faculty,
                'session'=>$document->session]);

            if ($cours) {
                if ($cours->status==1){
                    $coursArray = Json::decode($cours->cours,true);
                    $arrayCours = array_merge($coursArray["ness"],$coursArray["opt"]);
                    $array = [];
                    foreach ($arrayCours as $key =>$value){
                        if (is_array($value)){
                            $array[] = $value["id"];
                        }else{
                            $array[] = $key;
                        }
                    }
                    
                    $coursInfo = Cours::find()->where(["id"=>$array])->asArray()->all();
                    $coursId = [];
                    foreach ($coursInfo as $item){
                        array_push($coursId,$item["id"]);
                    }
                    $coursWare = IpCourseWare::find()->where(['cours'=>$coursId])->asArray()->all();
                    foreach ($coursWare as $key =>$record){
                        foreach ($coursInfo as $item){
                            if ($item["id"]==$record["cours"]){
                                $coursWare[$key]["name"] = $item["name"];
                            }
                        }
                    }

                    return $this->render('students_cours_lists',['cours'=>$coursWare]);
                }

                return $this->redirect('index.php?r=student/mon_cours');
            } else {
                return $this->redirect('index.php?r=student/create_cours');
            }
        }else{
            return $this->redirect('index.php?r=site/index');
        }

    }


    public function actionDetail($id){

        $uid = Yii::$app->user->getId();
        $document = Demander::findOne(['uid'=>$uid,'status'=>1]);
        if ($document) {
            $cours = IpCoursStudents::findOne([
                'sid' => $uid,
                'year' => $document->year,
                'faculty'=>$document->faculty,
                'session'=>$document->session]);
            if ($cours) {
                if ($cours->status==1){
                    $coursArray = Json::decode($cours->cours,true);
                    $array = array_keys(array_merge($coursArray["ness"],$coursArray["opt"]));
                    $coursInfo = Cours::find()->select("id")->where(["name"=>$array])->asArray()->all();
                    foreach ($coursInfo as $key => $info){
                        $coursInfo[$key] = $info["id"];
                    }
                    $model = IpCourseWare::findOne(["id"=>$id]);
                    if(in_array($model->cours,$coursInfo)){
                        IpCourseWareDetail::setPrix($id);
                        $items = IpCourseWareDetail::find()->where(['wid'=>$id])->all();
                        return $this->render('cour_detail',[
                            "model"=>$model,
                            "items"=>$items
                        ]);
                    }

                }

                return $this->redirect('index.php?r=student/mon_cours');
            } else {
                return $this->redirect('index.php?r=student/create_cours');
            }
        }else{
            return $this->redirect('index.php?r=site/index');
        }

    }


    public function actionDownload(){

        $id = Yii::$app->request->get('id');
        $category = Yii::$app->request->get('category');

        if ($id&&$category){
            IpCourseWareDetail::setPrix($category);
            $item = IpCourseWareDetail::find()->where(['wid'=>$category,'id'=>$id])->one();
            return Yii::$app->response->sendFile($item->data_url);
//            return $this->redirect('index.php?r=components/detail&id='.$category);

        }

        return $this->redirect('index.php?r=site/index');



    }

    public function actionIndex(){
        $searchModel = new CourseWareSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }




    public function actionCreate_course_ware(){
        $model = new IpCourseWare();
        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->ctime = PublicFunctionUnion::getTimeString();
            $model->utime = PublicFunctionUnion::getTimeString();
            $model->year = Json::encode($model->year);
            $model->faculty = Json::encode($model->faculty);
            $model->session = Json::encode($model->session);
            if ($model->save()){
                return $this->redirect('index.php?r=components/index');
            }
        }

        return $this->render('createCourseWare',[
            'model'=>$model
        ]);
    }


    public function actionUpdate_course_ware($id){
        $model = IpCourseWare::findOne(['id'=>$id]);
        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->utime = PublicFunctionUnion::getTimeString();
            $model->year = Json::encode($model->year);
            $model->faculty = Json::encode($model->faculty);
            $model->session = Json::encode($model->session);
            if ($model->save()){
                return $this->redirect('index.php?r=components/index');
            }
        }
        $model->year = Json::decode($model->year,true);
        $model->faculty = Json::decode($model->faculty,true);
        $model->session = Json::decode($model->session,true);
        return $this->render('update_course_ware',[
            'model'=>$model
        ]);
    }


    public function actionCourse_ware_detail_list($id){
        $courseWare = IpCourseWare::findOne(['id'=>$id]);
        $searchModel = new CourseWareDetailSearchForm();
        $searchModel->setWid($id);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('course_ware_detail_list',[
            'courseWare'=>$courseWare,
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);

    }


    public function actionAdd_course_ware_detail($id){
        $courseWare = IpCourseWare::findOne(['id'=>$id]);
        if ($courseWare){
            IpCourseWareDetail::setPrix($courseWare->id);
            $model = new IpCourseWareDetail();
            $model->wid = $courseWare->id;

            if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post())) {

                $model->data_url = UploadedFile::getInstance($model, "data_url");
                $dir = "../../uploads/files/".$model->wid;
                if (!is_dir($dir))
                    mkdir($dir,0777);
                $fileName = date("HiiHsHis").$model->data_url->baseName . "." . $model->data_url->extension;
                $dir = $dir."/". $fileName;
                $model->data_url->saveAs($dir);
                $model->ctime = PublicFunctionUnion::getTimeString();
                $model->utime = PublicFunctionUnion::getTimeString();
                $model->data_url = $dir;
                if ($model->save()){
                    return $this->redirect('index.php?r=components/course_ware_detail_list&id='.$model->wid);
                }
            }

            return $this->render('add_course_ware_detail',
                ['model'=>$model]
            );
        }
    }



    public function actionDelete_course_ware_detail($id,$wid){
        if($id&&$wid){
            IpCourseWareDetail::setPrix($wid);
            $model = IpCourseWareDetail::findOne(['id'=>$id]);
            $model->delete();
        }

        return $this->redirect('index.php?r=components/course_ware_detail_list&id='.$wid);
    }


    public function actionUpdate_course_ware_detail($id,$wid){
        if($id&&$wid){
            IpCourseWareDetail::setPrix($wid);
            $model = IpCourseWareDetail::findOne(['id'=>$id]);
            return $this->render('update_course_ware_detail',[
                'model'=>$model
            ]);
        }

        return $this->redirect('index.php?r=components/course_ware_detail_list&id='.$wid);

    }

    public function actionStudent_course_lists(){

        return $this->render('student_course_lists');
    }
}

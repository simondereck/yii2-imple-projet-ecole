<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/12/2019
 * Time: 23:07
 */

namespace admin\controllers;

use common\models\IpProfessuer;
use common\models\searchForm\ProfesseurSearchForm;
use common\widgets\PublicFunctionUnion;
use yii\filters\AccessControl;
use admin\models\AdminAccessControl;
use yii\web\Controller;
use Yii;
class ProfesseurController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'matchCallback'=>function(){
                            return AdminAccessControl::getIsProfesseur();
                        }
                    ],
                    [
                        'actions' => ['create','update','lists','delete','uploadPhoto'],
                        'allow' => true,
                        'matchCallback'=>function(){
                            return AdminAccessControl::getIsSuperAdmin();
                        }
                    ],
                ],
            ],
        ];
    }


    public function actions()
    {

        return [
            'uploadPhoto' => [
                'class' => 'budyaga\cropper\actions\UploadAction',
                'url' => Yii::$app->params['domain'].'/ilproject/uploads/professeur/',
                'path' => '@uploads/professeur/',
            ]
        ];

    }

    public $layout = 'professeur';


    public function actionIndex(){
        return $this->render('index');
    }


    public function actionLists(){
        $this->layout = "admin";
        $searchModel = new ProfesseurSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('lists',[
            'dataProvider'=>$dataProvider
        ]);

    }

    public function actionCreate(){
        $this->layout = "admin";
        $model = new IpProfessuer();

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->ctime = PublicFunctionUnion::getTimeString();
            $model->utime = PublicFunctionUnion::getTimeString();
            if ($model->save()){
                return $this->redirect('index.php?r=professeur/lists');
            }
        }

        return $this->render('create',[
            'model'=>$model
        ]);
    }


    public function actionUpdate($id){
        $this->layout = "admin";
        $model =  IpProfessuer::findOne(['id'=>$id]);
        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->ctime = PublicFunctionUnion::getTimeString();
            $model->utime = PublicFunctionUnion::getTimeString();
            if ($model->save()){
                return $this->redirect('index.php?r=professeur/lists');
            }
        }

        return $this->render('update',[
            'model'=>$model
        ]);
    }


    public function actionDelete($id){
        if ($id){
            $model = IpProfessuer::findOne(["id"=>$id]);
            $model->delete();
        }
        return $this->redirect('index.php?r=professeur/lists');
    }

}

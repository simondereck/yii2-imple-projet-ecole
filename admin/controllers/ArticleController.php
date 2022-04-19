<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 12:50
 */

namespace admin\controllers;

use common\models\searchForm\VieStudentSearchForm;
use common\widgets\PublicFunctionUnion;
use Yii;
use common\models\IpVieStudent;
use yii\web\Controller;
use yii\filters\AccessControl;
use admin\models\AdminAccessControl;

class ArticleController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','uploadPhoto','delete_article','update_article'],
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
//                'url' => Yii::$app->params['domain'].'/ilproject/uploads/article/',
                'url' => Yii::$app->params['domain'].'/uploads/article/',

                'path' => '@uploads/article/',
            ]
        ];

    }

    public function actionIndex(){

        $searchModel = new VieStudentSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);

    }


    public function actionCreate(){

        $model = new IpVieStudent();

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->ctime = PublicFunctionUnion::getTimeString();
            $model->utime = PublicFunctionUnion::getTimeString();
            if ($model->save()){
                return $this->redirect('index.php?r=article/index');
            }
        }

        return $this->render('create',[
            'model'=>$model
        ]);
    }


    public function actionUpdate_article($id){

        $model = IpVieStudent::findOne(["id"=>$id]);

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->utime = PublicFunctionUnion::getTimeString();
            if ($model->save()){
                return $this->redirect('index.php?r=article/index');
            }
        }

        return $this->render('update',[
            'model'=>$model
        ]);
    }


    public function actionDelete_article($id){
        $model = IpVieStudent::findOne(["id"=>$id]);
        $model->delete();
        return $this->redirect('index.php?r=article/index');

    }


}

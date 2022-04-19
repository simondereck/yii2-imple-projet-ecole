<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/05/2019
 * Time: 18:01
 */

namespace admin\controllers;

use admin\models\AdminAccessControl;
use common\models\Cours;
use common\models\searchForm\CoursSearchForm;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;


class CoursController extends Controller
{


    public $layout = "admin";

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create_cours','delete_cours','update_cours'],
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

        $searchModel = new CoursSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);

    }

    public function actionCreate_cours(){
        $model = new Cours();
        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            if ($model->save()){
                return $this->redirect('index.php?r=cours/index');
            }
        }

        return $this->render('createCours',[
            'model'=>$model
        ]);
    }

    public function actionDelete_cours($id){

        $model = Cours::findOne(["id"=>$id]);
        $model->delete();

        return $this->redirect("index.php?r=cours/index");
    }



    public function actionUpdate_cours($id){
        $model = Cours::findOne(["id"=>$id]);

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            if ($model->save()){
                return $this->redirect("index.php?r=cours/index");
            }
        }

        return $this->render("updateCours",[
            "model"=>$model
        ]);

    }






}

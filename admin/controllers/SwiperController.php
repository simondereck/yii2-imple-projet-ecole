<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 00:13
 */

namespace admin\controllers;

use common\models\IpSwiper;
use common\models\searchForm\SwiperForm;
use common\widgets\PublicFunctionUnion;
use yii\filters\AccessControl;
use admin\models\AdminAccessControl;
use yii\web\Controller;
use Yii;

class SwiperController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','uploadPhoto','delete_swiper','update_swiper'],
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
//                'url' => Yii::$app->params['domain'].'/ilproject/uploads/swiper/',
                'url' => Yii::$app->params['domain'].'/uploads/swiper/',
                'path' => '@uploads/swiper/',
            ]
        ];

    }

    public function actionIndex(){
        $searchModel = new SwiperForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'dataProvider'=>$dataProvider
        ]);
    }


    public function actionCreate(){
        $model = new IpSwiper();

        if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
            $model->ctime = PublicFunctionUnion::getTimeString();
            if ($model->save()){
                return $this->redirect('index.php?r=swiper/index');
            }

        }

        return $this->render('create',[
            'model'=>$model
        ]);
    }


    public function actionDelete_swiper($id){
        $item = IpSwiper::findOne(["id"=>$id]);
        $item->delete();
        return $this->redirect('index.php?r=swiper/index');
    }


    public function actionUpdate_swiper($id){

        $model = IpSwiper::findOne(["id"=>$id]);
        if ($model){
            if (Yii::$app->request->post()&&$model->load(Yii::$app->request->post())){
                if ($model->save()){
                    return $this->redirect('index.php?r=swiper/index');

                }
            }
            return $this->render('update',[
                'model'=>$model
            ]);
        }

        return $this->redirect('index.php?r=swiper/index');
    }

}

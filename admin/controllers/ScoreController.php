<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 27/03/2020
 * Time: 09:02
 */

namespace admin\controllers;


use common\models\IpCoursScores;
use common\models\searchForm\DemanderSearchForm;
use common\widgets\PublicFunctionUnion;
use yii\helpers\Json;
use yii\web\Controller;
use admin\models\AdminAccessControl;
use yii\filters\AccessControl;
use Yii;
use common\models\Demander;
use common\models\IpCoursStudents;
class ScoreController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update_score','detail','delete_score'],
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
        $searchModel = new DemanderSearchForm();
        $dataProvider = $searchModel->searchScore(Yii::$app->requestedParams);
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'searchModel'=>$searchModel
        ]);
    }


    public function actionUpdate_score($id){
        $document = Demander::findOne(['id'=>$id,'status'=>1]);
        if ($document) {
            $cours = IpCoursStudents::findOne([
                'sid' => $document->uid,
                'year' => $document->year,
                'faculty'=>$document->faculty,
                'status'=>1,
                'session'=>$document->session]);
            if (!$cours){
                return $this->render('no_cours');
            }
            $scores = new IpCoursScores();
            $scores->cid = $cours->sid;
            $scores->loadOptions($cours->cours);

            if (Yii::$app->request->post()){
                $items = Yii::$app->request->post();
                $results = [];
                $results['total'] = array();
                $results['items'] = array();
                $results['moyenne'] = array();
                $results['total']['points'] = 0;
                $results['total']['coefs'] = 0;
                $results['total']['ects'] = 0;
                $results['total']['ects1'] = 0;
                $results['total']['notes'] = 0;
                foreach ($items as $item){
                    if ($item['coefs']==0){
                        $item['coefs'] = $item['ects']/2;
                    }
                    $item['points'] = $item['coefs']* $item['notes'];
                    if ($item['notes']>=10){
                        $item['validee'] = 'Oui';
                        $item['ects1'] = $item['ects'];
                    }else{
                        $item['validee'] = 'Non';
                        $item['ects1'] = 0;
                    }
                    $results['total']['points'] += $item['points'];
                    $results['total']['coefs'] += $item['coefs'];
                    $results['total']['ects'] += $item['ects'];
                    $results['total']['ects1'] += $item['ects1'];
                    $results['total']['notes'] += $item['notes'];
                    $results['items'][] = $item;

                }

                $results['moyenne']['notes'] = $results['total']['notes']/count($items);
                $results['moyenne']['ects1'] = $results['total']['ects1'];

                $scores->cours = Json::encode($results);
                $scores->utime = PublicFunctionUnion::getTimeString();
                $scores->ctime = PublicFunctionUnion::getTimeString();
                $scores->status = 1;
                if ($scores->save()){
                    return $this->redirect('index.php?r=score/index');
                }
                $scores->options = $results;
            }

            return $this->render('update_score',[
                'cours'=>$cours,
                'document'=>$document,
                'scores'=>$scores
            ]);
        }


        return $this->render('update_score');
    }

    /**
     * @return bool
     */
    public function actionDetail($id)
    {
        $document = Demander::findOne(['id'=>$id,'status'=>1]);
        if ($document) {
            $scores = IpCoursScores::findOne(['cid'=>$document->uid,'status'=>1]);
            if ($scores){
                return $this->render('detail',['scores'=>$scores,'document'=>$document]);
            }else{
                return $this->redirect('index.php?r=score/update_score&id='.$id);
            }

        }

        return $this->render('detail');
    }

    public function actionDelete_score($id)
    {
        $document = Demander::findOne(['id'=>$id,'status'=>1]);
        if ($document) {
            $scores = IpCoursScores::findOne(['cid'=>$document->uid,'status'=>1]);
            if ($scores){
                $scores->delete();
            }
        }
        return $this->redirect('index.php?r=score/index');
    }
}

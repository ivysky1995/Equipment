<?php

namespace app\controllers;

use Yii;
use app\models\Equipment;
use app\models\EquipmentSearch;
use app\models\LendingHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EquipmentController implements the CRUD actions for Equipment model.
 */
class EquipmentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class'=>AccessControl::className(),
               
                'rules' => [
                    [
                        'actions'=>['login','error'],
                        'allow' =>true,
                        'roles'=>'?',
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['view'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['create'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['delete'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['update'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['lending','return'],
                        'roles' => ['manager'],
                    ],
                   
                    
                    
                    ],
                ],
            ];
    }

    /**
     * Lists all Equipment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquipmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Equipment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equipment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Equipment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Equipment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Equipment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Create Action Lending 
     */
    public function actionLending($id)
    {
       


        return $this->render('lending', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Create Action Return 
     */
    public function actionReturn($id)
    {
        return $this->render('return', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreateLendingHistory()
    {
        $lendingHistory = new LendingHistory();

        if ($lendingHistory->load(Yii::$app->request->post())){
            
            if ($lendingHistory->save()){
                return $this->redirect(['lending','id'=>$lendingHistory->equipment->id]);
            }
        }
        return $this->render('lending',[
            'lendingHistory'=>$lendingHistory,
        ]);

    }
    public function actionCreateReturnHistory()
    {
        $lendingHistory = new LendingHistory();

        if ($lendingHistory->load(Yii::$app->request->post())){
            
            if ($lendingHistory->save()){
                return $this->redirect(['/lending-history','equipmentId'=>$lendingHistory->equipment->id]);
            }
        }
        return $this->render('return',[
            'lendingHistory'=>$lendingHistory,
        ]);
        
    }
    // protected function findReturnHistory($id)
    // {
    //     if (($lendingHistory = LendingHistory::findOne($id)) !== null) {
    //         return $lendingHistory;
    //     }

    //     throw new NotFoundHttpException('The requested page does not exist.');
    // }
}

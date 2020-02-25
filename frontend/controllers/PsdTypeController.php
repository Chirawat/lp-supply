<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PsdType;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * PsdTypeController implements the CRUD actions for PsdType model.
 */
class PsdTypeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PsdType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PsdType::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PsdType model.
     * @param integer $id
     * @param integer $Group_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $Group_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Group_Id),
        ]);
    }

    /**
     * Creates a new PsdType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PsdType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Group_Id' => $model->Group_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PsdType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Group_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $Group_Id)
    {
        $model = $this->findModel($id, $Group_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Group_Id' => $model->Group_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PsdType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Group_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $Group_Id)
    {
        $this->findModel($id, $Group_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PsdType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Group_Id
     * @return PsdType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Group_Id)
    {
        if (($model = PsdType::findOne(['id' => $id, 'Group_Id' => $Group_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetType(){
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents  != null) {
                $groupId = $parents[0];
                $data_t = PsdType::find()->where(['Group_Id' => $groupId])->all();
                $data = [];
                foreach($data_t as $data_tt){
                    array_push($data, [ 
                        'id' => $data_tt->id,
                        'name' => $data_tt->Type_Name
                        ]
                    );
                }
               echo Json::encode(['output'=>$data, 'selected'=>'']);
               return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
}

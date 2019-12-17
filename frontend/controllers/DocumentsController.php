<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Documents;
use frontend\models\Description;
use frontend\models\Supplier;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\Common;

/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller
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
     * Lists all Documents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Documents::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documents model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $descriptions = Description::find()->where([
            'document_id' => $id,
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' => $descriptions,
        ]);


        return $this->render('view', [
            'model' => $this->findModel($id),
            'descriptions' => $descriptions->all(),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documents();
        $suppliers = Supplier::find()->all();
        

        if ($model->load(Yii::$app->request->post())){ 
            $supplier = Supplier::find()->where([
                'name' => Yii::$app->request->post('Documents')['supplier'],
            ])->one();
            $model->supplier_id = $supplier['id'];
            if($model->validate()){
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $last_record = Documents::find()->orderBy(['id' => SORT_DESC])->one();
        $last_record_by_year = Documents::find()
            ->where(['year'=>2563])
            ->orderBy(['id' => SORT_DESC])->count();
        $model['id'] = $last_record['id'] + 1;
        $model['doc_date'] = Common::DateThai(date("Y/m/d"));
        $model['year'] = 2563;
        $model['doc_id'] = $last_record_by_year + 1;
        return $this->render('create', [
            'model' => $model,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Updates an existing Documents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $suppliers = Supplier::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Deletes an existing Documents model.
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
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

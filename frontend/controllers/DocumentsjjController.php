<?php

namespace frontend\controllers;

use Yii;
use frontend\models\DocumentsJj;
use frontend\models\DescriptionJj;
use frontend\models\Supplier;
use frontend\controllers\Common;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\mpdf\Pdf;

/**
 * DocumentsJjController implements the CRUD actions for DocumentsJj model.
 */
class DocumentsJjController extends Controller
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
     * Lists all DocumentsJj models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DocumentsJj::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DocumentsJj model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $descriptions = DescriptionJj::find()->where([
            'documents_jj_id' => $id,
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
     * Creates a new DocumentsJj model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DocumentsJj();
        $suppliers = Supplier::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            // var_dump(Yii::$app->request->post());
            // die();
            $supplier = Supplier::find()->where([
                'name' => Yii::$app->request->post('DocumentsJj')['supplier'],
            ])->one();
            $model->supplier_id = $supplier['id'];
            if($model->validate()){
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return var_dump($model->errors);
                die();
            }
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        $last_record = DocumentsJj::find()->orderBy(['id' => SORT_DESC])->one();
        $model['id'] = $last_record['id'] + 1;
        $model['doc_date'] = Common::DateThai(date("Y/m/d"));

        $model['year'] = 2563;
        $model['doc_id'] = $last_record['id'] + 1;

        return $this->render('create', [
            'model' => $model,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Updates an existing DocumentsJj model.
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

    public function actionSummaryReport(){
        $documents = DocumentsJj::find()
            ->where(['year'=>2563])
            ->all();
        $content = $this->renderPartial('_reportView', [
            'documents' => $documents,
        ]);
        // setup kartik\mpdf\Pdf component
        $str = 'แผ่นที่ {PAGENO} / {nb}<br>วันที่พิมพ์ ' . date("d/m/") . (date("Y")+543);
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE ,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => [
                '@frontend/web/css/pdf.css',
            ],
            // any css to be embedded if required
            //        'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => [
                'title' => 'รายงานการจัดซื้อ/จ้าง',
                'defaultfooterfontsize' => 12,
                'defaultfooterline' => 0,
                'defaultfooterfontstyle'=>'R'
            ],

            'defaultFont' => 'thsaraban9',
            'defaultFontSize' => 16,
            'marginLeft' => 20,
            'marginTop' => 20,
            'marginRight' => 10,
            'marginBottom' => 20,
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['<b>Krajee Report Header</b>'],
                'SetFooter'=>[
                        $str
                    ],      // remove 20161117
                ]
        ]);
        // $pdf->configure(array(
        //     'defaultfooterline' => '0',
        //     'defaultfooterfontstyle' => 'R',
        //     'defaultfooterfontsize' => '10',
        // ));
        // return the pdf output as per the destination setting
        return $pdf->render();
    }


    /**
     * Deletes an existing DocumentsJj model.
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
     * Finds the DocumentsJj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DocumentsJj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DocumentsJj::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

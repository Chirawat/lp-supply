<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Description;
use frontend\models\PsdGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\mpdf\Pdf;

/**
 * DescriptionController implements the CRUD actions for Description model.
 */
class DescriptionController extends Controller
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
     * Lists all Description models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Description::find(),
            'pagination' => [
                'pageSize' => 500,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Description model.
     * @param integer $id
     * @param integer $PSD_Type_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $PSD_Type_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $PSD_Type_Id),
        ]);
    }

    /**
     * Creates a new Description model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Description();
        $model['document_id'] = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['documents/view', 'id' => $model->document_id]);
            //return $this->redirect(['documents/view']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Description model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $PSD_Type_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $PSD_Type_Id)
    {
        $model = $this->findModel($id, $PSD_Type_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'PSD_Type_Id' => $model->PSD_Type_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Description model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $PSD_Type_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $PSD_Type_Id)
    {
        $this->findModel($id, $PSD_Type_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Description model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $PSD_Type_Id
     * @return Description the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $PSD_Type_Id)
    {
        if (($model = Description::findOne(['id' => $id, 'PSD_Type_Id' => $PSD_Type_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegistration(){
        $model = PsdGroup::find()->all();

        return $this->render('registration', [
            'model' => $model
        ]);
    }

    public function actionReport($group_id){
        $descriptions_group = Description::find()
            ->joinWith(['document'])
            ->where([
                'PSD_Group_Id' => $group_id,
            ])
            ->andWhere(['year' => 2563])
            ->orderBy([
                'PSD_Type_Id' => 'ASC'
            ])
            ->groupBy([
                'PSD_Type_Id',
            ])->all();
        //var_dump($descriptions_group); die();

        $descriptions_t = [];
        foreach($descriptions_group as $des){
            array_push($descriptions_t, Description::find()
                ->joinWith(['document'])
                ->where(['PSD_Type_Id' => $des->PSD_Type_Id])
                ->andWhere(['year' => 2563])
                ->all()
            );
        }
        //var_dump($descriptions_t); die();

        
        $content = $this->renderPartial('_reportView', [
            'descriptions_group' => $descriptions_group, 
            'descriptions_t' => $descriptions_t,
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
}

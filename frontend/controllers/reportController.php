<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Documents;
use frontend\models\Descriptions;
use frontend\controllers\Common;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDocumentReport($id){
        $document = Documents::find()->where(['id' => $id])->one();
        $descriptions = $document->descriptions;
        $total = array_sum(array_column($descriptions, 'price'));
        // var_dump($descriptions);
        // die();
        $content = $this->renderPartial('_reportView', [
          'document' => $document,
          'descriptions' => $descriptions,
          'description_count' => count($descriptions),
          'total' => $total,
          'bahttext' => Common::num2thai($total),
        ]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
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
            'options' => ['title' => 'รายงานการจัดซื้อ/จ้าง'],

            'defaultFont' => 'thsaraban9',
            'defaultFontSize' => 16,
            'marginLeft' => 30,
            'marginTop' => 25,
            'marginRight' => 20,
            'marginBottom' => 20,
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
                //'SetFooter'=>['หน้า {PAGENO} / {nb}'],      // remove 20161117
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

<?php 
use yii\helpers\Html;
$formatter = \Yii::$app->formatter;
?>

<h1 align="center">ทะเบียนคุมการจัดจ้าง ปีงบประมาณ <?=$documents[0]->year?></h1>

<table width="100%" class="border1px" >
    <tr>
        <td align="center" width="12%">เลขที่เอกสาร</td>
        <td align="center" style="line-height:50px" width="15%">วัน เดือน ปี</td>
        <td align="center" width="18%">ผู้ขอ</td>
        <td align="center" width="18%">ร้านค้า/ผู้รับจ้าง</td>
        <td align="center" width="18%">รายการจ้าง</td>
        <td align="center">จำนวนเงิน</td>
        <td align="center">หมายเหตุ</td>
    </tr>
    <?php foreach($documents as $document): ?>
        <tr>
            <td align="center"><?= $document->doc_id?>/<?=$document->year?></td>
            <td align="center"><?= $document->doc_date ?></td>
            <td><?= $document->advance_by?></td>
            <td><?= $document->supplier->name?></td>
            <td><?=$document->do?></td>
            <td align="right"><?= number_format($document->amt, 2)?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</table>
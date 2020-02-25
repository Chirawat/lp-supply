<?php 
use yii\helpers\Html;
$formatter = \Yii::$app->formatter;
?>

<h1 align="center"><?=$descriptions_group[0]->pSDGroup->Name?></h1>

<ol>
<?php foreach($descriptions_group as $descriptions_group_t): ?>

    <li style="padding-left:100px;"><?= $descriptions_group_t->pSDType->Type_Name ?> (รหัส <?= str_pad($descriptions_group_t->pSDType->id, 4, 0, STR_PAD_LEFT)?>)

<?php endforeach; ?>
</ol>



<?php foreach($descriptions_t as $descriptions): ?>
<pagebreak />
<table width="100%" >>
    <tr>
        <td valign="bottom" align="center">
            <div style="font-size: 32px; font-weight: bold;">
                บัญชีวัสดุ
            </div>
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="60%">
        </td>
        <td width="10%">
            <div style="font-weight: bold;">ส่วนราชการ</div>
        </td>
        <td>สำนักงานคณะกรรมการขั้นพื้นฐาน</td>
    </tr>
    <tr>
        <td width="60%">
        </td>
        <td width="10%">
            <div style="font-weight: bold;">หน่วยงาน</div>
        </td>
        <td>โรงเรียนลิ้นฟ้าพิทยาคม</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="30%">
            <div style="font-weight: bold;">ประเภท 
                <span style="font-weight: normal;"><?=$descriptions[0]->pSDGroup->Name?></span>
            </div>
        </td>
        <td width="30%">
            <div style="font-weight: bold;">ชื่อหรือชนิดวัสดุ
                <span style="font-weight: normal;"><?=$descriptions[0]->pSDType->Type_Name?></span>
            </div>
        </td>
        <td width="30%">
            <div style="font-weight: bold;">รหัส
                <span style="font-weight: normal;">
                    <?=str_pad($descriptions[0]->pSDType->id, 4, 0, STR_PAD_LEFT)?>
                </span>
            </div>
        </td>
        <td width="10%">
            
        </td>
    </tr>
    <tr>
        <td width="30%">
            <div style="font-weight: bold;">ขนาดหรือลักษณะ
            </div>
        </td>
        <td width="30%">
        </td>
        <td width="30%">
            <div style="font-weight: bold;">จำนวนอย่างสูง -</div>
        </td>
        <td width="10%">
        </td>
    </tr>
    <tr>
        <td width="30%">
            <div style="font-weight: bold;">หน่วยที่นับ
                <span style="font-weight: normal;"><?=$descriptions[0]->pSDType->Type_Unit?></span>
            </div>
        </td>
        <td width="30%">
        </td>
        <td width="30%">
            <div style="font-weight: bold;">จำนวนอย่างต่ำ -</div>
        </td>
        <td width="10%">
        </td>
    </tr>
</table>
<table width="100%" class="border1px">
    <tr>
        <td align="center" rowspan="2" style="line-height:50px" width="15%">วัน เดือน ปี</td>
        <td align="center" rowspan="2" width="25%">รับจาก/จ่ายให้</td>
        <td align="center" rowspan="2" width="10%">เลขที่เอกสาร</td>
        <td align="center" rowspan="2" width="10%">ราคาต่อหน่วย</td>
        <td align="center" colspan="3">จำนวน</td>
        <td align="center" rowspan="2">หมายเหตุ</td>
    </tr>
    <tr>
        <td align="center" width="10%">รับ</td>
        <td align="center" width="10%">จ่าย</td>
        <td align="center" width="10%">คงเหลือ</td>
    </tr>
    <?php foreach($descriptions as $description):?>
    <tr>
        <td align="center" valign="top">
            <?=$description->document->doc_date?>
        </td>
        <td>
            <?=$description->document->supplier->name?>
        </td>
        <td align="center">
            ร.<?=$description->document->doc_id?>/<?=$description->document->year?>
        </td>
        <td align="right" style="padding-right:20px">
            <?=number_format($description->unit_price, 2)?>
        </td>
        <td align="center">
            <?=$description->quantity?>
        </td>
        <td></td>
        <td align="center">
            <?=$description->quantity?>
        </td>
        <td>
           
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="padding-left:20px">
            <?=$description->document->advance_by?>
        </td>
        <td align="center">
            จ.<?=$description->document->doc_id?>/<?=$description->document->year?>
        </td>
        <td></td>
        <td></td>
        <td align="center">
            <?=$description->quantity?>
        </td>
        <td align="center">
            0
        </td>
        <td>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endforeach; ?>

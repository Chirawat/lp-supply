<?php 
use yii\helpers\Html;
$formatter = \Yii::$app->formatter;

?>
<table width="100%" >>
    <tr>
        <td width="1.5cm">
            <?=Html::img('/img/krut.jpg', ['height' => '1.5cm'])?><br>
        </td>
        <td valign="bottom" align="center">
            <div style="font-size: 32px; font-weight: bold;">
                บันทึกข้อความ
            </div>
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="15%">
            <div style="font-weight: bold;">ส่วนราชการ</div>
        </td>
        <td>โรงเรียนลิ้นฟ้าพิทยาคม อำเภอยางชุมน้อย จังหวัดศรีสะเกษ</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="8%">
            <div style="font-weight: bold;">ที่</div>
        </td>
        <td width="45%"></td>
        <td width="8%">
            <div style="font-weight: bold;">วันที่</div>
        </td>
        <!-- <td width="6%">๒๕</td> -->
        <td><?=$document->doc_date?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="8%">
            <div style="font-weight: bold;">เรื่อง</div>
        </td>
        <td>รายงานขอความเห็นชอบจัดจ้าง</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="8%">เรียน</td>
        <td>ผู้อำนวยการโรงเรียนลิ้นฟ้าพิทยาคม</td>
    </tr>
</table>
<p style="text-indent: 2.5cm;">
    ด้วยโรงเรียนลิ้นฟ้าพิทยาคม  ได้ดำเนินการ<?=$document->do?> เพื่อใช้ในโครงการ <?=$document->plan?> กิจกรรม <?=$document->for?> จาก <?=$document->supplier->name?> จำนวน <?=$description_count?> รายการ เป็นจำนวนเงิน <?=$formatter->asDecimal($total)?> บาท (<?= $bahttext ?>)  ตาม<?php $document->invoice_id == '-' ? print('ใบสำคัญรับเงิน'): print('ใบเสร็จรับเงิน เลขที่ ' . $document->invoice_id)?> ลงวันที่ <?=$document->invoice_date?>
</p>
<p style="text-indent: 2.5cm;">
    ทั้งนี้  การดำเนินการจัดซื้อดังกล่าว เป็นการดำเนินการตามหนังสือด่วนที่สุด ที่ กค (กวจ) 0405.2/ว 119  ลงวันที่ 7 มีนาคม 2561 เรื่อง แนวทางการปฏิบัติในการดำเนินการจัดหาพัสดุที่เกี่ยวกับ ค่าใช้จ่ายในการบริหารงาน ค่าใช้จ่ายในการฝึกอบรม การจัดงาน และการประชุมของหน่วยงานของรัฐ
</p>
<p style="text-indent: 2.5cm;">
    จึงเรียนมาเพื่อโปรดพิจารณาให้ความเห็นชอบและอนุมัติเงิน  ทั้งนี้ให้ถือรายงานฉบับนี้เป็น หลักฐานการตรวจรับ พัสดุโดยอนุโลม
</p>
<br>
<br>
<table width="100%">
    <tr>
        <td width="40%"></td>
        <td align="center">
            (นายจิราวัฒน์  นางาม)
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="40%"></td>
        <td align="center">
            วันที่ <?=$document->doc_date?>
        </td>
        <td></td>
    </tr>
</table>
<br>
<p style="margin: 0px;">เรียน  ผู้อำนวยการโรงเรียนลิ้นฟ้าพิทยาคม</p>
<p style="padding-left: 1cm; margin: 0px;">โปรดพิจารณา</p>
<p style="padding-left: 1.5cm; margin: 0px;">
    ๑. ให้ความเห็นชอบการจัดซื้อดังกล่าวข้างต้น<br>
    ๒. อนุมัติให้จ่ายเงิน จำนวน  <?=$formatter->asDecimal($total)?> บาท (<?=$bahttext?>)  ให้แก่<br>
</p>
<p style="padding-left: 2cm; margin: 0px;">
    <?=$document->advance_by?> ผู้ทดรองจ่าย
</p>
<p style="padding-left: 5cm;">(ลงชื่อ)..........................................เจ้าหน้าที่</p>
<p style="padding-left: 5cm;">(ลงชื่อ)..........................................หัวหน้าเจ้าหน้าที่</p>
<p style="padding-left: 5cm;">(ลงชื่อ)..........................................หัวหน้าฝ่ายอำนวยการ</p>
<p style="padding-left: 6cm; margin: 0px;">(นางวิลัย  ชิณวงศ์)</p>
<p style="padding-left: 7cm; margin: 0px;">- เห็นชอบ</p>
<p style="padding-left: 7cm; margin: 0px;">- อนุมัติ</p>
<br>
<table width="100%">
    <tr>
        <td width="40%"></td>
        <td align="center">(ลงชื่อ)..........................................</td>
        <td>ผู้อำนวยการโรงเรียน</td>
    </tr>
    <tr>
        <td></td>
        <td align="center">(นางวันดี  พรหมมา)</td>  
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td align="center">วันที่ <?=$document->doc_date?></td>
        <td></td>
    </tr>
</table>


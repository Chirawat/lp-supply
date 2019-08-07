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
        <td>รายงานขอความเห็นชอบจัดซื้อ</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="8%">เรียน</td>
        <td>ผู้อำนวยการโรงเรียนลิ้นฟ้าพิทยาคม</td>
    </tr>
</table>
<p style="text-indent: 2.5cm;">
    ด้วยโรงเรียนลิ้นฟ้าพิทยาคม  ได้ดำเนินการซื้อ <?=$document->do?> จาก <?=$document->supplier->name?> จำนวน <?=$description_count?> รายการ เป็นจำนวนเงิน <?=$formatter->asDecimal($total)?> บาท (<?= $bahttext ?>)  ตามใบเสร็จรับเงินเลขที่ <?=$document->invoice_id?> ลงวันที่ <?=$document->invoice_date?> เพื่อ<?=$document->for?>
</p>
<p style="text-indent: 2.5cm;">
    ทั้งนี้  การดำเนินการจัดซื้อดังกล่าว เป็นการดำเนินการตามหนังสือด่วนที่สุด ที่ กค (กวจ) 0405.2/ว 119  ลงวันที่ 7 มีนาคม 2561 เรื่อง แนวทางการปฏิบัติในการดำเนินการจัดหาพัสดุที่เกี่ยวกับ ค่าใช้จ่ายในการบริหารงาน ค่าใช้จ่ายในการฝึกอบรม การจัดงาน และการประชุมของหน่วยงานของรัฐ
</p>
<p style="text-indent: 2.5cm;">
    จึงเรียนมาเพื่อโปรดพิจารณาให้ความเห็นชอบและอนุมัติเงิน  ทั้งนี้ให้ถือรายงานฉบับนี้เป็น หลักฐานการตรวจรับ พัสดุโดยอนุโลม
</p>
<br>
<br>
<p style="padding-left: 8.5cm; margin: 0px;">(นายจิราวัฒน์  นางาม)</p>
<p style="padding-left: 8.5cm; margin: 0px;">วันที่ <?=$document->doc_date?></p>
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
<p style="padding-left: 5cm;">(ลงชื่อ)............................เจ้าหน้าที่</p>
<p style="padding-left: 5cm;">(ลงชื่อ)............................หัวหน้าเจ้าหน้าที่</p>
<p style="padding-left: 5cm;">(ลงชื่อ)............................หัวหน้าฝ่ายอำนวยการ</p>
<p style="padding-left: 6cm; margin: 0px;">(นางวิลัย  ชิณวงศ์)</p>
<p style="padding-left: 8.5cm; margin: 0px;">- เห็นชอบ</p>
<p style="padding-left: 8.5cm; margin: 0px;">- อนุมัติ</p>
<br>
<p style="padding-left: 7cm; margin: 0px;">(ลงชื่อ)............................ผู้อำนวยการโรงเรียน</p>
<p style="padding-left: 8cm; margin: 0px;">(นางวันดี  พรหมมา)</p>
<p style="padding-left: 7.8cm; margin: 0px;">วันที่ <?=$document->doc_date?></p>


<pagebreak />

<table width="100%">
    <tr>
        <td align="center" style="font-size: 32px; font-weight: bold;">
            ใบเบิกพัสดุ
        </td>
    </tr>
    <tr>
        <td align="center" style="line-height:25px">
            ตามระเบียบกระทรวงการคลัง ว่าด้วยการจัดซื้อจัดจ้างและการบริหารพัสดุภาครัฐ พ.ศ.2560<br>
            ข้อ 204 และข้อ 206
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td width="60%"></td>
        <td style="line-height:25px">
            ใบเบิก เลขที่ จ.<?=$document->id?> /2562<br>
            วันที่ <?=$document->doc_date?><br>
            โรงเรียนลิ้นฟ้าพิทยาคม<br>
        <td>
    </tr>
</table>
<p style="text-indent: 2.5cm; padding-bottom: 6pt;">
    ข้าพเจ้าขอเบิกพัสดุซื้อวัสดุ ในรายการ<?=$document->plan?>  ตามรายการดังต่อไปนี้
</p>
<table width="100%" class="border1px">
    <tr>
        <td align="center" style="line-height:30px">ลำดับ</td>
        <td align="center">รายละเอียดคุณลักษณะ</td>
        <td align="center">จำนวน</td>
        <td align="center">หน่วย</td>
        <td align="center">ราคา</td>
        <td align="center">หมายเหตุ</td>
    </tr>
    <?php $i=1; foreach($descriptions as $description):?>
        <tr>
            <td align="center" style="line-height:20px"><?=$i++?></td>
            <td>&nbsp;<?=$description->item?></td>
            <td align="center"><?=$description->quantity?></td>
            <td align="center"><?=$description->unit?></td>
            <td align="center"><?=$description->price?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<table width="100%">
    <tr>
        <td align="center">
            (ลงชื่อ)............................ ผู้เบิก
        </td>
        <td align="center">
            (ลงชื่อ)............................ ผู้สั่งจ่าย
        </td>
    </tr>
    <tr>
        <td align="center">
            (<?=$document->advance_by?>)
        </td>
        <td align="center">
            นายเชน เพ็งมาตร
        </td>
    </tr>
    
    <tr>
        <td align="center">
            ตำแหน่ง <?=$document->position?>
        </td>
        <td align="center">
            หัวหน้าเจ้าหน้าที่
        </td>
    </tr>
    <tr>
        <td align="center">
            วันที่ <?=$document->doc_date?>
        </td>
        <td align="center">
            วันที่ <?=$document->doc_date?>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td align="center">
            (ลงชื่อ)............................ ผู้รับของ
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="center">
            (<?=$document->advance_by?>)
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="center">
            วันที่ <?=$document->doc_date?>
        </td>
    </tr>
</table>


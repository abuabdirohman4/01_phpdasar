<?php

$html = '
<html>
    <head>
    </head>
    <body>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <td width="15%">Ref. No.</td>
                    <td width="10%">Quantity</td>
                    <td width="45%">Description</td>
                    <td width="15%">Unit Price</td>
                    <td width="15%">Amount</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td align="center">MF1234567</td>
                    <td align="center">10</td>
                    <td>Large pack Hoover bags</td>
                    <td class="cost">&pound;2.56</td>
                    <td class="cost">&pound;25.60</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
';

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
require_once $path . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Acme Trading Co. - Invoice");
$mpdf->SetAuthor("Acme Trading Co.");
$mpdf->SetWatermarkText("Paid");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
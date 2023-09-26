<?php

namespace Pierre\PdfExample;

use Spipu\Html2Pdf\Html2Pdf;

class PdfMaker
{
    public function makePdf()
    {
        ob_start();
        include __DIR__.'/html_demo.php';
        $htmlDocument = ob_get_clean();


        $html2pdf = new Html2Pdf('P', 'A4', 'fr', true);
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($htmlDocument);
        $html2pdf->output('demo.pdf', 'D');
    }
}

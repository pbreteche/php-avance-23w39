<?php

namespace Pierre\PdfExample;

use Knp\Snappy\Pdf;

class PdfPrinter
{
    public function printPdf()
    {
        $pdf = new Pdf(getenv('WKHTMLTOPDF_PATH'));
        header('Content-Type: application/pdf');
        echo $pdf->getOutput('http://localhost:8000/demo.html');
    }
}
